<?php

/**
 *  Checked!
 *
 *  File autoloader
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 *
 */

namespace KnowITMedia\DevAltitudePro;

/**
 * Load nonadmin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_nonadmin_files() {

	$filenames = array(
		'setup.php',
		'components/customizer/css-handler.php',
		'components/customizer/customizer.php',
		'components/customizer/helpers.php',
		'functions/formating.php',
		'functions/load-assets.php',
		'functions/markup.php',
		'structure/comments.php',
//		'structure/footer.php',
//		'structure/header.php',
		'structure/menu.php',
		'structure/post.php',
		'structure/sidebar.php',
		'components/woocommerce/woocommerce-setup.php',
		'components/woocommerce/woocommerce-output.php',
		'components/woocommerce/woocommerce-notice.php',
	);

	load_specified_files( $filenames );
}

//add_action( 'admin_init', __NAMESPACE__ . '\load_admin_files' );
/**
 * Load admin files.
 *
 * @since 1.0.1
 *
 * @return void
 */
function load_admin_files() {
	$filenames = array(

	);

	load_specified_files( $filenames );

}

/**
 * Load each of the specified files.
 *
 * @since 1.0.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';
	foreach( $filenames as $filename ) {
		include( $folder_root . $filename );
	}
}

load_nonadmin_files();
