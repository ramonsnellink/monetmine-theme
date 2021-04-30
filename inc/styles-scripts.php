<?php
/**
 * Enqueue Styles and scripts
 * 
 */


function rfl_styles() {
	wp_enqueue_style( 'rfl-styles', get_stylesheet_directory_uri() . '/assets/css/main.css', [], filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
}
add_action( 'wp_enqueue_scripts', 'rfl_styles',  99  );


