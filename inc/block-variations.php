<?php
/**
 * Block Variations
 */
function prefix_editor_assets() {
    wp_enqueue_script(
    'prefix-block-variations',
    get_stylesheet_directory_uri() . '/assets/js/block-variations.js', // use stylesheet directory, because: child theme
    array( 'wp-blocks' )
    );
    }


 add_action( 'enqueue_block_editor_assets', 'prefix_editor_assets' );