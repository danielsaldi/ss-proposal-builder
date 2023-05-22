<?php
/**
 * Theme setup file
 *
 * @package Studio_Science
 */

if ( ! function_exists( 'studioscience_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function studioscience_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Studio Science, use a find and replace
		 * to change 'studioscience' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'studioscience', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Add Thumbnail Theme Support
		add_image_size('huge', 1920, '', true); // Huge Thumbnail
		add_image_size('xtra-large', 1024, '', true); // Extra Large Thumbnail
		add_image_size('large', 700, '', true); // Large Thumbnail
		add_image_size('medium', 250, '', true); // Medium Thumbnail
		add_image_size('small', 60, '', true); // Small Thumbnail

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'studioscience' ),
			'header-links' => esc_html__( 'Header Links', 'studioscience' ),
			'footer-menu-col-1' => esc_html__( 'Footer Menu Col 1', 'studioscience' ),
			'footer-menu-col-2' => esc_html__( 'Footer Menu Col 2', 'studioscience' ),
			'footer-menu-col-3' => esc_html__( 'Footer Menu Col 3', 'studioscience' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'studioscience_setup' );


/**
 * Enqueue Styles - Load Front End CSS
 *
 * @since 1.0.0
 */
function studioscience_enqueue_front_end_styles() {

	$version = THEME_VERSION;
	$handle = sanitize_title_with_dashes( THEME_NAME );

	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
	wp_dequeue_style( 'global-styles' );

   	wp_enqueue_style( $handle . '-style',get_template_directory_uri() . '/build/style-index.css', array(), $version );

}
add_action( 'wp_enqueue_scripts', 'studioscience_enqueue_front_end_styles' );

/**
 * Enqueue Admin Styles - Load Editor CSS for Preview
 *
 * @since 1.0.0
 */
function studioscience_enqueue_admin_styles() {

	$version = THEME_VERSION;
	$handle = sanitize_title_with_dashes( THEME_NAME );
   	wp_enqueue_style( $handle . '-admin-style', get_template_directory_uri() . '/build/index.css', array(), $version );

}
add_action( 'admin_enqueue_scripts', 'studioscience_enqueue_admin_styles' );

/**
 * Enqueue Scripts - Load Front End JS
 *
 * @since 1.0.0
 */
function studioscience_enqueue_front_end_scripts() {

	$version = THEME_VERSION;
	$handle = sanitize_title_with_dashes( THEME_NAME );

	wp_enqueue_script( $handle . '-main', get_template_directory_uri() . '/build/index.js', array('wp-element', 'jquery'), $version, true );

}
add_action( 'wp_enqueue_scripts', 'studioscience_enqueue_front_end_scripts' );

/**
* Custom Menu Walker
*/
class StudioScience_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= '<li class="menu-item-parent ' .  implode(' ', $item->classes) . '">';
		if(in_array( 'menu-item-has-children', $item->classes)) {
			$output .= '<div class="submenu-close"></div>';
		}
		$output .= '<a href="' . $item->url . '" target="' . $item->target . '">';
		$output .= $item->title;
		$output .= '</a>';
    }
}