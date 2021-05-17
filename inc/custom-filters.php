<?php
/**
 * Custom Filters and Functions
 * 
 */


 // Remove "more" jump
 add_filter( 'generate_more_jump', '__return_false' );


 
// Get the excerpt for a shortcode
add_shortcode( 'excerpt', function() {

    if ( has_excerpt()) {
        return get_the_excerpt();
    }
    
    
} );

// Remove Excerpt

add_filter( 'wp_trim_excerpt', 'db_excerpt_metabox_remove' );
function db_excerpt_metabox_remove( $excerpt ) {
	$output = $excerpt;
	
	if ( has_excerpt() ) {
		$output = '';
	}
	
	return $output;
}


add_filter( 'generate_more_tag', '__return_false' );

// add category after entry title


add_action( 'generate_after_entry_title', function() {
    $cat = get_the_category();
    if ( isset( $cat[0]->name ) && is_single() ) {
        $category_link = get_category_link(  $cat[0]->cat_ID );
         echo '<div class="entry-category"><a class="entry-category-link" href="' . esc_url($category_link) . '">'. $cat[0]->name . '</a></div>';

    }
} );

add_filter( 'generate_back_to_top_scroll_speed', 'tu_back_to_top_scroll_speed' );
function tu_back_to_top_scroll_speed() {
    return 200; // milliseconds
}

add_post_type_support( 'page', 'excerpt' );

// Skip lazy load for featured image on single and page

add_filter( 'wp_get_attachment_image_attributes', function( $attr ) {
    if (is_single() || is_page()) {
        $attr['class'] .= ' skip-lazy';

    }
    return $attr;
} );

// Register third menu for Category filter

add_action( 'init', function() {
    register_nav_menu( 'third-menu', __( 'Third Menu' ) );
} );

// Remove Entry Header from posts

add_filter( 'generate_show_entry_header', function( $show ) {
    if ( is_single() ) {
        $show = false;
    }

    return $show;
} );