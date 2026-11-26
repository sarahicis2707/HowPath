<?php
/**
 * Plugin Name: HowPath Page
 * Description: Aplica a las páginas de HowPath los cambios de contenido guardados en GitHub (carpeta content-changes) y muestra el shortcode [howpath_home].
 * Version: 0.5.0
 * Author: HowPath
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HOWPATH_CHANGES_DIR', plugin_dir_path( __FILE__ ) . 'content-changes/' );
define( 'HOWPATH_CHANGES_LOG', 'howpath_content_changes' );
define( 'HOWPATH_CHANGES_LOCK', 'howpath_content_changes_lock' );
define( 'HOWPATH_HOME_PAGE_ID', 23 );

// Página de WordPress => shortcode del plugin que la dibuja.
function howpath_page_shortcodes() {
	return array(
		23 => 'howpath_home',
		24 => 'howpath_about',
	);
}

require_once plugin_dir_path( __FILE__ ) . 'includes/icons.php';

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
 * Para reemplazar todo el contenido de la página se usa "set_content" junto con
 * "expect_sha256": el contenido solo se sustituye si el actual coincide con esa
 * huella, así no se pisa una edición hecha después desde WordPress.
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

	$has_replacements = ! empty( $data['replacements'] ) && is_array( $data['replacements'] );
	$has_set_content  = isset( $data['set_content'] ) && is_string( $data['set_content'] );

	if ( ! is_array( $data ) || empty( $data['page_id'] ) || ( ! $has_replacements && ! $has_set_content ) ) {
		return howpath_change_result( 'error', 'El archivo no tiene el formato esperado.' );
	}

	$page_id = (int) $data['page_id'];
	$post    = get_post( $page_id );
	if ( ! $post ) {
		return howpath_change_result( 'error', 'No existe la página indicada.', $page_id );
	}

	$content = $post->post_content;

	if ( $has_set_content ) {
		if ( empty( $data['expect_sha256'] ) || ! hash_equals( (string) $data['expect_sha256'], hash( 'sha256', $content ) ) ) {
			return howpath_change_result( 'error', 'El contenido actual de la página no es el esperado (alguien la editó). No se cambió nada.', $page_id );
		}
		$content = $data['set_content'];
	}

	foreach ( ( $has_replacements ? array_values( $data['replacements'] ) : array() ) as $i => $item ) {
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
		'howpath-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap',
		array(),
		null
	);
	wp_register_style(
		'howpath-page',
		plugins_url( 'assets/css/howpath.css', __FILE__ ),
		array( 'howpath-fonts' ),
		file_exists( $css_path ) ? filemtime( $css_path ) : '0.3.0'
	);

	$site_css = plugin_dir_path( __FILE__ ) . 'assets/css/site.css';
	wp_enqueue_style(
		'howpath-site',
		plugins_url( 'assets/css/site.css', __FILE__ ),
		array(),
		file_exists( $site_css ) ? filemtime( $site_css ) : '0.4.0'
	);

	if ( howpath_page_uses_home() ) {
		wp_enqueue_style( 'howpath-page' );
	}
}
add_action( 'wp_enqueue_scripts', 'howpath_register_assets' );

// Vista previa solo para quien puede editar páginas: añade ?hp_preview=1 a la URL de la página.
// Devuelve el shortcode que se debe mostrar, o una cadena vacía.
function howpath_preview_shortcode() {
	if ( ! isset( $_GET['hp_preview'] ) || ! current_user_can( 'edit_pages' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return '';
	}
	foreach ( howpath_page_shortcodes() as $page_id => $tag ) {
		if ( is_page( $page_id ) ) {
			return $tag;
		}
	}
	return '';
}

function howpath_page_uses_home() {
	if ( ! is_singular() ) {
		return false;
	}
	if ( '' !== howpath_preview_shortcode() ) {
		return true;
	}
	$post = get_post();
	if ( ! $post ) {
		return false;
	}
	foreach ( howpath_page_shortcodes() as $tag ) {
		if ( has_shortcode( $post->post_content, $tag ) ) {
			return true;
		}
	}
	return false;
}

function howpath_preview_content( $content ) {
	$tag = howpath_preview_shortcode();
	if ( '' !== $tag && in_the_loop() && is_main_query() ) {
		return '[' . $tag . ']';
	}
	return $content;
}
add_filter( 'the_content', 'howpath_preview_content', 1 );

function howpath_home_shortcode() {
	wp_enqueue_style( 'howpath-page' );
	ob_start();
	include plugin_dir_path( __FILE__ ) . 'templates/home.php';
	return ob_get_clean();
}
add_shortcode( 'howpath_home', 'howpath_home_shortcode' );

function howpath_about_shortcode() {
	wp_enqueue_style( 'howpath-page' );
	ob_start();
	include plugin_dir_path( __FILE__ ) . 'templates/about.php';
	return ob_get_clean();
}
add_shortcode( 'howpath_about', 'howpath_about_shortcode' );
