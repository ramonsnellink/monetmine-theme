<?php
/**
 * Enqueue Styles and scripts
 * 
 */


function rfl_styles() {
	wp_enqueue_style( 'rfl-styles', get_stylesheet_directory_uri() . '/assets/css/main.css', [], filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
}
add_action( 'wp_enqueue_scripts', 'rfl_styles',  99  );



if (!is_single() || is_page()) {

}


function cat_dropdown( ){

	wp_enqueue_script( 'category_dropdown', get_stylesheet_directory_uri() . '/assets/js/category_dropdown.js', array(), false, true);


    // if(!is_page([7,28])){
    //     wp_dequeue_script( 'jquery');
    //     wp_deregister_script( 'jquery');   
    // } 

	if(is_single() || is_page() || is_search()) {
		wp_dequeue_script( 'category_dropdown');
		 wp_deregister_script( 'category_dropdown');   
	}


}

add_action( 'wp_enqueue_scripts', 'cat_dropdown', PHP_INT_MAX );