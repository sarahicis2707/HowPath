<?php
/**
 * Plugin Name: HowPath Page
 * Description: Aplica a las páginas de HowPath los cambios de contenido guardados en GitHub (carpeta content-changes) y muestra el shortcode [howpath_home].
 * Version: 0.2.0
 * Author: HowPath
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HOWPATH_CHANGES_DIR', plugin_dir_path( __FILE__ ) . 'content-changes/' );
define( 'HOWPATH_CHANGES_LOG', 'howpath_content_changes' );
define( 'HOWPATH_CHANGES_LOCK', 'howpath_content_changes_lock' );

/*
 * Cambios de contenido
 *
 * Cada archivo .json de content-changes/ describe un cambio a una página:
 *
 * {
 *   "page_id": 23,
 *   "description": "Qué cambia",
 *   "replacements": [
 *     { "find": "texto actual", "replace": "texto nuevo", "count": 1 }
 *   ]
 * }
 *
 * Cada archivo se aplica una sola vez, en orden alfabético. Antes de cambiar
 * nada se comprueba que cada texto a buscar aparezca exactamente "count" veces
 * (1 si no se indica). Si no coincide, no se toca la página y se muestra un
 * aviso en el escritorio de WordPress. WordPress guarda una revisión de la
 * página antes de cada cambio, así que siempre se puede volver atrás.
 */

function howpath_apply_content_changes() {
	$files = glob( HOWPATH_CHANGES_DIR . '*.json' );
	if ( empty( $files ) ) {
		return;
	}
	sort( $files, SORT_STRING );

	$log = get_option( HOWPATH_CHANGES_LOG, array() );
	if ( ! is_array( $log ) ) {
		$log = array();
	}

	$pending = array();
	foreach ( $files as $file ) {
		$id = basename( $file, '.json' );
		if ( ! isset( $log[ $id ] ) ) {
			$pending[ $id ] = $file;
		}
	}
	if ( empty( $pending ) ) {
		return;
	}

	// Evita que dos visitas simultáneas apliquen el mismo cambio.
	if ( ! add_option( HOWPATH_CHANGES_LOCK, time(), '', false ) ) {
		$locked_at = (int) get_option( HOWPATH_CHANGES_LOCK );
		if ( time() - $locked_at < 120 ) {
			return;
		}
		update_option( HOWPATH_CHANGES_LOCK, time(), false );
	}

	foreach ( $pending as $id => $file ) {
		$log[ $id ] = howpath_apply_change_file( $file );
		update_option( HOWPATH_CHANGES_LOG, $log, false );
	}

	delete_option( HOWPATH_CHANGES_LOCK );
}
add_action( 'init', 'howpath_apply_content_changes', 20 );

function howpath_change_result( $status, $message, $page_id = 0 ) {
	return array(
		'status'  => $status,
		'message' => $message,
		'page_id' => (int) $page_id,
		'time'    => current_time( 'mysql' ),
	);
}

function howpath_apply_change_file( $file ) {
	$data = json_decode( (string) file_get_contents( $file ), true );

	if ( ! is_array( $data ) || empty( $data['page_id'] ) || empty( $data['replacements'] ) || ! is_array( $data['replacements'] ) ) {
		return howpath_change_result( 'error', 'El archivo no tiene el formato esperado.' );
	}

	$page_id = (int) $data['page_id'];
	$post    = get_post( $page_id );
	if ( ! $post ) {
		return howpath_change_result( 'error', 'No existe la página indicada.', $page_id );
	}

	$content = $post->post_content;

	foreach ( array_values( $data['replacements'] ) as $i => $item ) {
		if ( ! is_array( $item ) || ! isset( $item['find'], $item['replace'] ) || '' === $item['find'] ) {
			return howpath_change_result( 'error', sprintf( 'El reemplazo %d está incompleto.', $i + 1 ), $page_id );
		}

		$expected = isset( $item['count'] ) ? (int) $item['count'] : 1;
		$found    = substr_count( $content, $item['find'] );
		if ( $found !== $expected ) {
			return howpath_change_result(
				'error',
				sprintf( 'Reemplazo %d: se esperaban %d coincidencias y hay %d. No se cambió nada.', $i + 1, $expected, $found ),
				$page_id
			);
		}

		$content = str_replace( $item['find'], $item['replace'], $content );
	}

	if ( $content === $post->post_content ) {
		return howpath_change_result( 'applied', 'Sin diferencias; no hizo falta actualizar.', $page_id );
	}

	// El contenido viene del repositorio, no de un visitante: se guarda tal cual
	// para no perder estilos, SVG ni atributos de los bloques.
	kses_remove_filters();
	$result = wp_update_post(
		array(
			'ID'           => $page_id,
			'post_content' => wp_slash( $content ),
		),
		true
	);
	kses_init();

	if ( is_wp_error( $result ) ) {
		return howpath_change_result( 'error', 'WordPress no pudo guardar la página: ' . $result->get_error_message(), $page_id );
	}

	return howpath_change_result( 'applied', isset( $data['description'] ) ? (string) $data['description'] : 'Aplicado.', $page_id );
}

function howpath_content_changes_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$log = get_option( HOWPATH_CHANGES_LOG, array() );
	if ( ! is_array( $log ) ) {
		return;
	}
	foreach ( $log as $id => $entry ) {
		if ( isset( $entry['status'] ) && 'error' === $entry['status'] ) {
			printf(
				'<div class="notice notice-error"><p><strong>HowPath:</strong> el cambio <code>%s</code> no se aplicó. %s</p></div>',
				esc_html( $id ),
				esc_html( $entry['message'] )
			);
		}
	}
}
add_action( 'admin_notices', 'howpath_content_changes_notice' );

/*
 * Shortcode [howpath_home] (plantilla y estilos propios del plugin)
 */

function howpath_register_assets() {
	$css_path = plugin_dir_path( __FILE__ ) . 'assets/css/howpath.css';
	wp_register_style(
		'howpath-page',
		plugins_url( 'assets/css/howpath.css', __FILE__ ),
		array(),
		file_exists( $css_path ) ? filemtime( $css_path ) : '0.2.0'
	);
}
add_action( 'wp_enqueue_scripts', 'howpath_register_assets' );

function howpath_home_shortcode() {
	wp_enqueue_style( 'howpath-page' );
	ob_start();
	include plugin_dir_path( __FILE__ ) . 'templates/home.php';
	return ob_get_clean();
}
add_shortcode( 'howpath_home', 'howpath_home_shortcode' );
