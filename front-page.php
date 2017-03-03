<?php
/**
 * Front page to the Developer Altitude Pro Theme.
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 */

namespace KnowITMedia\DevAltitudePro;

use function KnowITMedia\DevAltitudePro\Customizer\get_settings_prefix;
use function KnowITMedia\DevAltitudePro\widget_area_class;

add_action( 'genesis_meta', __NAMESPACE__ . '\add_front_page_genesis_meta' );

/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 * @since 1.0.0
 */
function add_front_page_genesis_meta() {

	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) || is_active_sidebar( 'front-page-5' ) || is_active_sidebar( 'front-page-6' ) || is_active_sidebar( 'front-page-7' ) ) {

		// Enqueue scripts.
		add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_front_page_script' );

		// Add front-page body class.
		add_filter( 'body_class', __NAMESPACE__ . '\body_class' );

		// Force full width content layout.
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		// Remove breadcrumbs.
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		// Remove the default Genesis loop.
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		// Add homepage widgets.
		add_action( 'genesis_loop', __NAMESPACE__ . '\create_front_page_widgets' );

		// Add featured-section body class.
		if ( is_active_sidebar( 'front-page-1' ) ) {

			// Add image-section-start body class.
			add_filter( 'body_class', __NAMESPACE__ . '\featured_body_class' );

		}
	}
}

/**
 * Define front page scripts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_front_page_script() {
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-script', CHILD_THEME_URI . '/assets/js/home.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
}

// Define front-page body class.
function body_class( $classes ) {

	$classes[] = 'front-page';

	return $classes;

}

/**
 * Define featured-section body class.
 *
 * @param  array $classes
 *
 * @return array
 */
function featured_body_class( $classes ) {

	$classes[] = 'featured-section';

	return $classes;

}

/**
 * Add markup for front page widgets.
 *
 * @since 1.0.0
 *
 * @return void
 */
function create_front_page_widgets() {

	echo '<h2 class="screen-reader-text">' . __( 'Main Content', CHILD_TEXT_DOMAIN ) . '</h2>';

	genesis_widget_area( 'front-page-1', array(
		'before' => '<div id="front-page-1" class="front-page-1" tabindex="-1"><div class="image-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-1' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-2', array(
		'before' => '<div id="front-page-2" class="front-page-2" tabindex="-1"><div class="solid-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-2' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-3', array(
		'before' => '<div id="front-page-3" class="front-page-3" tabindex="-1"><div class="image-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-3' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-4', array(
		'before' => '<div id="front-page-4" class="front-page-4" tabindex="-1"><div class="solid-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-4' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-5', array(
		'before' => '<div id="front-page-5" class="front-page-5" tabindex="-1"><div class="image-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-5' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-6', array(
		'before' => '<div id="front-page-6" class="front-page-6" tabindex="-1"><div class="solid-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-6' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-7', array(
		'before' => '<div id="front-page-7" class="front-page-7" tabindex="-1"><div class="image-section"><div class="flexible-widgets widget-area' . widget_area_class( 'front-page-7' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

}

// Run the Genesis loop.
genesis();
