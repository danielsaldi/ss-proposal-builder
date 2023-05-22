<?php
/**
 * Studio Science functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Studio_Science
 */

define( 'THEME_NAME', 'Studio Science' );
define( 'THEME_VERSION', '1.0.0' );
define( 'BLOCKS_DIR', get_template_directory_uri() . '/inc/blocks' );
define( 'PARTIALS_DIR', get_template_directory_uri() . '/inc/partials' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Filters and Actions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Theme Helper Functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Load ACF Blocks
 */
require get_template_directory() . '/inc/blocks/blocks.php';
