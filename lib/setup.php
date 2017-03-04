<?php

/**
 *  Setup theme defaults.
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 *
 */

namespace KnowITMedia\DevAltitudePro;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup the child theme.
 *
 * @since 1.0.3
 *
 * @return void
 */
function setup_child_theme() {
	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, CHILD_THEME_DIR . '/languages' );

	unregister_genesis_callbacks();

	adds_theme_supports();
	adds_new_image_sizes();

	register_front_page_sidebars();

}

/**
 * Unregister Genesis callbacks. We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	// Unregister menu settings
	unregister_menu_callbacks();

	// Unregister layout settings.
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	// Unregister secondary sidebar.
	unregister_sidebar( 'sidebar-alt' );


}

/**
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_theme_supports() {

	$config = array(
		'html5' => array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'),
		'genesis-accessibility' => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),
		'genesis-responsive-viewport' => 'null',
		'genesis-footer-widgets' => 1, // 1-column footer widget area.
		'genesis-menus' => array(
			'secondary' => __( 'Before Header Menu', CHILD_TEXT_DOMAIN ),
			'primary'   => __( 'Header Menu', CHILD_TEXT_DOMAIN ),
			'footer'    => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
		),
		'custom-header' => array(
			'flex-height'     => true,
			'width'           => 720,
			'height'          => 152,
			'header-selector' => '.site-title a',
			'header-text'     => false,
		),
		'genesis-after-entry-widget-area' => 'null',
		'genesis-structural-wraps' => array(
			'header',
			'nav',
			'subnav',
			'footer-widgets',
			'footer',
		),
	);
	// Loops through and sets up the theme_supports.
	foreach( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Adds new image sizes.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_new_image_sizes() {

	$config = array(
		'featured-page' => array(
			'width'     => 1140,
			'height'    => 400,
			'crop'      => true,
		),
	);

	foreach( $config as $name => $args ){
	// Check to see what was entered for crop, set to false if not entered.
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );

/**
 * Updates theme settings on reset.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
	$config = get_theme_settings_defaults();

	$defaults = wp_parse_args( $config, $defaults );

	return $defaults;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
 * Updates theme settings on activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {
	$config = get_theme_settings_defaults();

	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}
	update_option( 'posts_per_page', $config['blog_cat_num'] );
}

/**
 * Get the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults() {
	return array(
		'blog_cat_num'              => 5,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',
	);
}

add_filter( 'simple_social_default_styles', __NAMESPACE__ . '\simple_social_default_styles' );
/**
 * Updates Simple Social Icon settings on activation.
 *
 * @since 1.0.0
 *
 * @parm array $defaults
 *
 * @return array
 */
function simple_social_default_styles( array $defaults ) {

	$args = array(
		'alignment'              => 'aligncenter',
		'background_color'       => '#000000',
		'background_color_hover' => '#222222',
		'border_radius'          => 4,
		'icon_color'             => '#ffffff',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 40,
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}
