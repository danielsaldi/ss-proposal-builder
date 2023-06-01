<?php
/**
 * Theme filters and actions
 *
 * @package Studio_Science
 */


 /**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function studioscience_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'studioscience_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function studioscience_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'studioscience_pingback_header' );

/*
Enable Options Page
*/
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title'    => __('Theme Options'),
		'menu_title'    => __('Theme Options'),
		'menu_slug'     => 'acf-options',
		'autoload'      => true
	));
}

/**
 * Add ACF Local json files.
 */ 
if (class_exists('ACF')) {
	function studioscience_acf_json_save_point( $path ) {
	    // update path
	    $path = get_stylesheet_directory() . '/acf-json';
	       
	    // return
	    return $path;   
	}
	add_filter('acf/settings/save_json', 'studioscience_acf_json_save_point');
}

/** 
 *Output Custom Scripts - Option Pages
 */

if (class_exists('ACF')) {
	function studioscience_output_header_scripts() {
		$scripts = get_field('header_scripts', 'options');
		if (isset($scripts)) {
			echo trim($scripts);
		}
	}
	add_action("header_scripts", "studioscience_output_header_scripts");

	function studioscience_output_body_scripts() {
		$scripts = get_field('body_scripts', 'options');
		if (isset($scripts)) {
			echo trim($scripts);
		}
	}
	add_action("body_scripts", "studioscience_output_body_scripts");

	function studioscience_output_footer_scripts() {
		$scripts = get_field('footer_scripts', 'options');
		if (isset($scripts)) {
			echo trim($scripts);
		}
	}
	add_action("footer_scripts", "studioscience_output_footer_scripts");
}

/**
* Register our callback to the appropriate filter
*/
function studioscience_add_format_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'studioscience_add_format_buttons' );

/**
* Add custom styles to the WordPress editor
*/
function studioscience_custom_styles( $init_array ) {

    $style_formats = array(
        // These are the custom styles
        array(
            'title'   => 'Typography Styles',
            'items' => array(
                array(
                    'title' => 'Heading 1',
                    'selector' => 'p,h1,h2,h3,h4,h5,h6,div,ul,ol,li',
                    'classes' => 'h_1',
                    'wrapper' => true,
                ),
                array(
                    'title' => 'Heading 2',
                    'selector' => 'p,h1,h2,h3,h4,h5,h6,div,ul,ol,li',
                    'classes' => 'h_2',
                    'wrapper' => true,
                ),
                array(
                    'title' => 'Heading 3',
                    'selector' => 'p,h1,h2,h3,h4,h5,h6,div,ul,ol,li',
                    'classes' => 'h_3',
                    'wrapper' => true,
                ),
                array(
                    'title' => 'Paragraph LG',
                    'selector' => 'p',
                    'classes' => 'p_lg',
                    'wrapper' => true,
                ),
                array(
                    'title' => 'Paragraph MD',
                    'selector' => 'p',
                    'classes' => 'p_md',
                    'wrapper' => true,
                ),
                array(
                    'title' => 'Paragraph',
                    'selector' => 'p',
                    'classes' => 'p',
                    'wrapper' => true,
                ),
            ),
        ),
        array(
            'title'   => 'Theme Text Colors',
            'items' => array(
                array(
                    'title' => 'Yellow',
                    'inline' => 'span',
                    'classes' => 'color-yellow',
                    'wrapper' => false,
                ),
                array(
                    'title' => 'White',
                    'inline' => 'span',
                    'classes' => 'color-white',
                    'wrapper' => false,
                ),
                array(
                    'title' => 'Black',
                    'inline' => 'span',
                    'classes' => 'color-black',
                    'wrapper' => false,
                ),
            ),
        ),
        array(
            'title'   => 'Theme Utilities',
            'items' => array(
                array(
                    'title' => 'Underline Black',
                    'inline' => 'span',
                    'classes' => 'underline_black',
                    'wrapper' => true,
                ),
                array(
                    'title' => 'Underline Yellow',
                    'inline' => 'span',
                    'classes' => 'underline_yellow',
                    'wrapper' => true,
                ),
            ),
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
add_filter( 'tiny_mce_before_init', 'studioscience_custom_styles' );

/*
 * Disable access to ACF and Theme Editors
 */
// add_filter('acf/settings/show_admin', '__return_false');
// define( 'DISALLOW_FILE_EDIT', true );

/*
 * Move Yoast to bottom
 */
function studioscience_yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'studioscience_yoasttobottom');

/*
 * Remove Blocks from Posts
 */
function studioscience_disable_block_for_post_type( $bool, $post ) {
    if ( 'post' === $post->post_type ):
        return false;
    endif;

    return $bool;
}
add_filter( 'use_block_editor_for_post', 'studioscience_disable_block_for_post_type', 10, 2 );


function studioscience_check_home() {
    if(is_home() || is_front_page()) {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        get_template_part( 404 ); exit();
    }
}
add_action('wp', 'studioscience_check_home');
