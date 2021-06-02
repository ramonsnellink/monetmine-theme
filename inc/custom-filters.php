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

// Custom shortcode for parent back link
add_shortcode('parent_link', function() {
    $parent = get_field('parent_link');

    if(!empty($parent) ) {

        return '<div class="page-hero-back"><a href="' .  esc_url($parent['url']) . '">' . '<svg viewBox="0 0 330 512" aria-hidden="true" role="img" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1em" height="1em">
        <path d="M305.913 197.085c0 2.266-1.133 4.815-2.833 6.514L171.087 335.593c-1.7 1.7-4.249 2.832-6.515 2.832s-4.815-1.133-6.515-2.832L26.064 203.599c-1.7-1.7-2.832-4.248-2.832-6.514s1.132-4.816 2.832-6.515l14.162-14.163c1.7-1.699 3.966-2.832 6.515-2.832 2.266 0 4.815 1.133 6.515 2.832l111.316 111.317 111.316-111.317c1.7-1.699 4.249-2.832 6.515-2.832s4.815 1.133 6.515 2.832l14.162 14.163c1.7 1.7 2.833 4.249 2.833 6.515z" fill-rule="nonzero"></path>
    </svg>' . $parent['title'] .'</a></div>'; 
    }
});


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
         echo '<div class="entry-category"><a class="entry-category-link " href="' . esc_url($category_link) . '">'. $cat[0]->name . '</a></div>';

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




// Hide certain category labels


add_filter('get_the_terms', 'hide_categories_terms', 10, 3);
function hide_categories_terms($terms){
    
    if ( ! is_admin() && is_single() ) {
        // filter for terms that are not in the exclude array
        $filtered_terms = array_filter($terms, function($term) {
            $excludeIDs = array(8, 864, 1872, 1880, 1881, 1882, 1883, 1888, );
            return ! in_array($term->term_id, $excludeIDs);
        });

        // return filtered array of terms
        return $filtered_terms;
    }

    // return default terms JIC the above case is not met
    return $terms;
}


// Remove LW Accordion styling

add_filter('lightweight_accordion_include_frontend_stylesheet', '__return_false' );


