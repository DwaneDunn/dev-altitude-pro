<?php

/**
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

$prefix = 'altitude';


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {

	wp_enqueue_script( $prefix . '-global', CHILD_THEME_DIR . '/assets/js/global.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( $prefix . '-google-fonts', '//fonts.googleapis.com/css?family=Ek+Mukta:200,800', array(), CHILD_THEME_VERSION );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( $prefix . '-responsive-menu', CHILD_URL . '/assets/js/responsive-menus' . $suffix . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	wp_localize_script( $prefix . '-responsive-menu', 'genesis_responsive_menu', 'localized_responsive_menu_settings' );

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
