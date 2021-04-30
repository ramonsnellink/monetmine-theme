<?php
/**
 * Block Editor styles and functionality
 * 
 */

add_theme_support( 'editor-color-palette', [
    [
        'name' => esc_attr__( 'yellow', 'generatepress' ),
        'slug' => 'yellow',
        'color' => '#F6D15E',
    ],
    [
        'name' => esc_attr__( 'dark-yellow', 'generatepress' ),
        'slug' => 'dark-yellow',
        'color' => '#EAB204',
    ],
        [
        'name' => esc_attr__( 'dark gray', 'generatepress' ),
        'slug' => 'dark-gray',
        'color' => '#1C1C1B',
    ],
    [
        'name' => esc_attr__( 'mid gray', 'generatepress' ),
        'slug' => 'mid-gray',
        'color' => '#807F7E',
    ],
    [
        'name' => esc_attr__( 'lighter gray', 'generatepress' ),
        'slug' => 'lighter-gray',
        'color' => '#EBE9E6',
    ],
    [
        'name' => esc_attr__( 'light gray', 'generatepress' ),
        'slug' => 'light-gray',
        'color' => '#F7F6F5',
    ],
    
] );
/** 
 * Add Color Palette to GP customizer 
*/


add_filter( 'generate_default_color_palettes', 'tu_custom_color_palettes' );
function tu_custom_color_palettes( $palettes ) {
	$palettes = array(
		'#000000',
		'#FFFFFF',
		'#F6D15E',
		'#EAB204',
		'#1C1C1B',
		'#807F7E',
		'#EBE9E6',
		'#F7F6F5',
	);
	
	return $palettes;
}

/** 
 * Add Reusable Blocks in menu
*/

function be_reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'be_reusable_blocks_admin_menu' );


/** 
 * Add Editor styles
*/
function editor_styles() {
    wp_enqueue_style( 'editor-styles', get_stylesheet_directory_uri() . '/assets/css/editor-style.css', [], filemtime( get_stylesheet_directory() . '/assets/css/editor-style.css' ) );
    // add_editor_style( 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap' ); // changed to system fonts

}
add_action( 'enqueue_block_editor_assets', 'editor_styles', 99 );


/** 
 * Add custom default container paddings
*/

add_filter( 'generateblocks_defaults', function( $defaults ) {
    $defaults['container']['paddingTop'] = '40';
    $defaults['container']['paddingRight'] = '20';
    $defaults['container']['paddingBottom'] = '40';
    $defaults['container']['paddingLeft'] = '20';

    return $defaults;
} );