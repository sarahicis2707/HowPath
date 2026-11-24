<?php
/**
 * Plugin Name: HowPath Page
 * Description: Contenido y estilos de la pagina principal de HowPath. Se muestra con el shortcode [howpath_home].
 * Version: 0.1.0
 * Author: HowPath
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function howpath_register_assets() {
	$css_path = plugin_dir_path( __FILE__ ) . 'assets/css/howpath.css';
	wp_register_style(
		'howpath-page',
		plugins_url( 'assets/css/howpath.css', __FILE__ ),
		array(),
		file_exists( $css_path ) ? filemtime( $css_path ) : '0.1.0'
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
