<?php

/**
 *  Theme initialization
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 */

namespace KnowITMedia\DevAltitudePro;

/**
 * Initialize theme constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {

	$child_theme = wp_get_theme();

	// Pull values from stylesheet style.css
	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );

	// Define directory constants.
	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

	define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/' );
	define( 'CHILD_ASSETS_DIR', CHILD_THEME_DIR . '/assets/' );

}

init_constants();
