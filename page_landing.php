<?php
/**
 * Developer Altitude Pro
 *
 * This file adds the landing page template to the Developer Altitude Pro Theme.
 *
 * Template Name: Landing
 *
 * @package KnowITMedia\DevAltitudePro
 * @since      1.0.0
 * @author     Dwane Dunn
 * @link       https://dwanedunn.com
 * @license    GNU General Public License 2.0+
 */

namespace KnowITMedia\DevAltitudePro;

unregister_landing_page_callbacks();
/**
 * Unregister landing page callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_landing_page_callbacks() {

	// Remove Skip Links.
	remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

	// Remove site header elements.
	remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
	remove_action( 'genesis_header', 'genesis_do_header' );
	remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

	// Remove navigation.
	remove_action( 'genesis_header', 'genesis_do_nav', 12 );
	remove_action( 'genesis_header', 'genesis_do_subnav', 5 );
	remove_action( 'genesis_footer', 'altitude_footer_menu', 7 );

	// Remove breadcrumbs.
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

	// Remove site footer widgets.
	remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

	// Remove site footer elements.
	remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
	remove_action( 'genesis_footer', 'genesis_do_footer' );
	remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

}

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add custom body class to the head
 *
 * @param array $classes
 *
 * @return array
 */
function add_body_class( $classes ) {

	$classes[] = 'altitude-landing';

	return $classes;

}

// Dequeue Skip Links Script.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\base_dequeue_skip_links' );
function base_dequeue_skip_links() {
	wp_dequeue_script( 'skip-links' );
}

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Run the Genesis loop.
genesis();
