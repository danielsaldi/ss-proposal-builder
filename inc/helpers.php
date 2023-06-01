<?php
/**
 * Theme helper functions
 *
 * @package Studio_Science
 */

/** 
* Common sense function for automating image retrieval 
*/
function studioscience_get_attachment( $attachment_id, $size = '' ) {

	$attachment = get_post( $attachment_id );

	if ( ! $attachment )
		return;

	$src = ( $size != '' ) ? wp_get_attachment_image_src( $attachment_id, $size )[0] : wp_get_attachment_url($attachment_id);
	$srcset = wp_get_attachment_image_srcset( $attachment_id );

	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'href' => get_permalink( $attachment->ID ),
		'src' => $src,
		'srcset' => $srcset,
	);
}

/** 
* Excerpt shorter length
*/
function studioscience_excerpt( $excerpt, $length = 155 ) {
    $max = $length;
    if( strlen( $excerpt ) > $max ) {
        return substr( $excerpt, 0, $max ). " &hellip;";
    } else {
        return $excerpt;
    }
}

/** 
* Get column layout by key narrow or wide
*/
function studioscience_column( $col_key ) {
    switch ($col_key) {
        case 'narrow':
            $col = 'col-xs-12 col-md-4';
            break;        
        case 'wide':
            $col = 'col-xs-12 col-md-8';
            break;
        default:
            $col = 'col-xs-12 col-md-4';
            break;
    }
    return $col;
}


/** 
* Check if integer is even
*/
function studioscience_is_even( $number ) {
    if ( $number % 2 ) {
        return true;
    }
    return false;
}

/** 
* Get column layout by key nnn, nw, wn and index
*/
function studioscience_check_column( $col_key, $index ) {
    switch ($col_key) {
        case 'nnn':
            $col = 'col-xs-12 col-md-4';
            break;        
        case 'wn':
            $col = studioscience_is_even($index) ? 'col-xs-12 col-md-8' : 'col-xs-12 col-md-4';
            break;
        case 'nw':
            $col = studioscience_is_even($index) ? 'col-xs-12 col-md-4' : 'col-xs-12 col-md-8';
            break;
        default:
            $col = 'col-xs-12 col-md-4';
            break;
    }
    return $col;
}

/**
 * Get Primary Cat
 */
function studioscience_check_for_primary_cat($post_id, $post_tax, $terms) {
    // If post has a category assigned.
    if($terms) {
        if ( class_exists('WPSEO_Primary_Term') ) {
            // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
            $wpseo_primary_term = new WPSEO_Primary_Term( $post_tax, $post_id );
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term( $wpseo_primary_term );
            if (is_wp_error($term)) {
                // Default to first category (not Yoast) if an error is returned
                return $terms[0];
            } else {
                // Yoast Primary category
                return $term;
            }
        } else {
            // Default, display the first category in WP's list of assigned categories
            return $terms[0];
        }
    }
}

/**
 * Get first paragraph from copy
 */
function studioscience_get_first_paragraph($copy){
    $str = $copy;//wpautop( $copy );
    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
    $str = strip_tags($str, '<a><strong><em>');
    return '<p>' . $str . '</p>';
}

/**
 * Clear <br/> markup 
 */
function studioscience_clear_br($text) { 
    return preg_replace("/<br\W*?\/>/", "", $text);
} 
