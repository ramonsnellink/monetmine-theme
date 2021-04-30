<?php
/**
 * Custom Filters and Functions
 * 
 */


 // Remove "more" jump
 add_filter( 'generate_more_jump', '__return_false' );
 
// Add Button to excerpt on blog/archive pages

add_filter( 'wp_trim_excerpt', 'tu_excerpt_metabox_more' );
function tu_excerpt_metabox_more( $excerpt ) {
    $output = $excerpt;

    if ( has_excerpt() && !is_single() && !is_page()) {
        $output = sprintf( '%1$s <p class="read-more-container"><a class="read-more button" href="%2$s">%3$s</a></p>',
            $excerpt,
            get_permalink(),
            __( 'Lees meer', 'generatepress' )
        );
    }
	
    return $output;
}


// Get the excerpt for a shortcode
add_shortcode( 'excerpt', function() {

    if ( has_excerpt()) {
        return get_the_excerpt();
    }
    
    
} );

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

