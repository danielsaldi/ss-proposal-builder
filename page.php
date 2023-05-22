<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Studio_Science
 */

get_header();

	if ( has_blocks( $post->post_content ) ) {
		$blocks = parse_blocks( $post->post_content );
		foreach( $blocks as $block ) {
            if(strpos($block['blockName'], 'acf') !== false) {
                 echo render_block( $block );
            } else {
            	echo apply_filters( 'the_content', render_block( $block ));
            }
        }
	}
	
get_footer();