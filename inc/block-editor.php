<?php
/**
 * Block Editor styles and functionality
 * 
 */

add_theme_support( 'editor-color-palette', [
    [
        'name' => esc_attr__( 'primary', 'generatepress' ),
        'slug' => 'primary',
        'color' => '#4c8383',
    ],
    [
        'name' => esc_attr__( 'secondary', 'generatepress' ),
        'slug' => 'secondary',
        'color' => '#f27f6d',
    ],
        [
        'name' => esc_attr__( 'primary-hover', 'generatepress' ),
        'slug' => 'primary-hover',
        'color' => '#65acac',
    ],
    [
        'name' => esc_attr__( 'primary-light', 'generatepress' ),
        'slug' => 'primary-light',
        'color' => '#f0f5f5',
    ],
    [
        'name' => esc_attr__( 'gray-100', 'generatepress' ),
        'slug' => 'gray-100',
        'color' => '#fafafa',
    ],
    [
        'name' => esc_attr__( 'gray-200', 'generatepress' ),
        'slug' => 'gray-200',
        'color' => '#f7f6f5',
    ],
    [
        'name' => esc_attr__( 'gray-300', 'generatepress' ),
        'slug' => 'gray-300',
        'color' => '#ebeae8',
    ],
    [
        'name' => esc_attr__( 'gray-400', 'generatepress' ),
        'slug' => 'gray-400',
        'color' => '#919191',
    ],
    [
        'name' => esc_attr__( 'gray-500', 'generatepress' ),
        'slug' => 'gray-500',
        'color' => '#575757',
    ],
    [
        'name' => esc_attr__( 'gray-600', 'generatepress' ),
        'slug' => 'gray-600',
        'color' => '#4f4d4c',
    ],
    [
        'name' => esc_attr__( 'gray-700', 'generatepress' ),
        'slug' => 'gray-700',
        'color' => '#383736',
    ],
    [
        'name' => esc_attr__( 'gray-800', 'generatepress' ),
        'slug' => 'gray-800',
        'color' => '#1f1e1d',
    ],
   
    
] );
/** 
 * Add Color Palette to GP customizer 
*/


add_filter( 'generate_default_color_palettes', 'tu_custom_color_palettes' );
function tu_custom_color_palettes( $palettes ) {
	$palettes = array(
	'#fafafa',
    '#f7f6f5',
    '#ebeae8',
    '#919191',
    '#575757',
    '#4f4d4c',
    '#383736',
    '#1f1e1d',
    '#4c8383',
    '#f27f6d',
    '#65acac',
    '#f0f5f5',
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
    $defaults['container']['paddingTop'] = '80';
    $defaults['container']['paddingRight'] = '20';
    $defaults['container']['paddingBottom'] = '80';
    $defaults['container']['paddingLeft'] = '20';

    $defaults['container']['paddingTopTablet'] = '40';
    $defaults['container']['paddingRightTablet'] = '20';
    $defaults['container']['paddingBottomTablet'] = '40';
    $defaults['container']['paddingLeftTablet'] = '20';

    return $defaults;
} );