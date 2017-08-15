<?php

/**
 *  Menu HTML markup structure
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 */

namespace KnowITMedia\DevAltitudePro;

/**
 * Unregister menu callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_menu_callbacks() {

	// Unregister the header right widget area.
	unregister_sidebar( 'header-right' );

	// Reposition the primary navigation menu.
	remove_action( 'genesis_after_header', 'genesis_do_nav' );

	// Remove output of primary navigation right extras.
	remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
	remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

	// Reposition the secondary navigation menu.
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );

}

// Reposition the primary navigation menu.
add_action( 'genesis_header', 'genesis_do_nav', 12 );

add_action( 'genesis_theme_settings_metaboxes', __NAMESPACE__ . '\remove_genesis_metaboxes' );
/**
 * Remove navigation meta box.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_theme_settings_pagehook, 'main' );
}

// Reposition the secondary navigation menu.
add_action( 'genesis_header', 'genesis_do_subnav', 5 );

add_filter( 'genesis_skip_links_output', __NAMESPACE__ . '\change_skip_links_output' );
/**
 * Remove skip link for primary navigation.
 *
 * @since 1.0.0
 *
 * @param array $links
 *
 * @return array
 */
function change_skip_links_output( array $links ) {

	if ( isset( $links['genesis-nav-primary'] ) ) {
		unset( $links['genesis-nav-primary'] );
	}

	return $links;

}

add_filter( 'body_class', __NAMESPACE__ . '\add_secondary_nav_class' );
/**
 * Add secondary-nav class if secondary navigation is used.
 *
 * @since 1.0.0
 *
 * @param array $classes
 *
 * @return array
 */
function add_secondary_nav_class( array $classes ) {

	$menu_locations = get_theme_mod( 'nav_menu_locations' );

	if ( ! empty( $menu_locations['secondary'] ) ) {
		$classes[] = 'secondary-nav';
	}

	return $classes;

}

add_action( 'genesis_footer', __NAMESPACE__ . '\add_in_footer_menu', 7 );
/**
 * Hook menu in footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_in_footer_menu() {

	genesis_nav_menu( array(
		'theme_location' => 'footer',
		'container'      => false,
		'depth'          => 1,
		'fallback_cb'    => false,
		'menu_class'     => 'genesis-nav-menu',
	) );

}

// Add Attributes for Footer Navigation.
add_filter( 'genesis_attr_nav-footer', 'genesis_attributes_nav' );
