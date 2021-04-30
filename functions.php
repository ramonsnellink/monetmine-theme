<?php
/**
 * Child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */


add_filter('acf/settings/remove_wp_meta_box', '__return_false');


add_action( 'after_setup_theme', 'rfl_theme_setup' );
function rfl_theme_setup() {
    add_image_size( 'large-thumb', 830, 830, true ); // (cropped)
}


// add_post_type_support( 'page', 'excerpt' );

$theme_dir =  get_stylesheet_directory();

// Enqueue styles and scripts

require $theme_dir . '/inc/styles-scripts.php';

// Custom Filters and Functions

require $theme_dir . '/inc/custom-filters.php';

// Block Editor
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/block-styles.php';
require $theme_dir . '/inc/block-variations.php';
require $theme_dir . '/inc/block-patterns.php';

// Cleanup

require $theme_dir . '/inc/cleanup.php';





