<?php

/**
 *  Checked!
 *
 *  Asset loader handler
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 *
 */

namespace KnowITMedia\DevAltitudePro;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {

	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-global', CHILD_THEME_URI . '/assets/js/global.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-google-fonts', '//fonts.googleapis.com/css?family=Ek+Mukta:200,800', array(), CHILD_THEME_VERSION );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( CHILD_TEXT_DOMAIN . 'responsive-menu', CHILD_THEME_URI . '/assets/js/responsive-menus' . $suffix . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	wp_localize_script( CHILD_TEXT_DOMAIN . '-responsive-menu', 'genesis_responsive_menu', localized_responsive_menu_settings() );

}

/**
 * Define responsive menu settings.
 *
 * @since 1.0.0
 *
 * @return array
 */
function localized_responsive_menu_settings() {

	$localized_script_args = array(
		'mainMenu'      => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'subMenu'       => __( 'Submenu', CHILD_TEXT_DOMAIN ),
		'menuClasses'   => array(
			'combine'       => array(
				'.nav-primary',
				'.nav-secondary',
			),
		),
	);

	return $localized_script_args;

}
