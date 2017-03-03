<?php

/**
 *  Checked!
 *
 *  Sidebar (widgetized areas) HTML markup structure
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
 * Register the front-page sidebar widget areas.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_front_page_sidebars() {

	// Register widget areas.
	genesis_register_sidebar( array(
		'id'          => 'front-page-1',
		'name'        => __( 'Front Page 1', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 1 section.', CHILD_TEXT_DOMAIN ),
	) );
	genesis_register_sidebar( array(
		'id'          => 'front-page-2',
		'name'        => __( 'Front Page 2', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 2 section.', CHILD_TEXT_DOMAIN ),
	) );
	genesis_register_sidebar( array(
		'id'          => 'front-page-3',
		'name'        => __( 'Front Page 3', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 3 section.', CHILD_TEXT_DOMAIN ),
	) );
	genesis_register_sidebar( array(
		'id'          => 'front-page-4',
		'name'        => __( 'Front Page 4', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 4 section.', CHILD_TEXT_DOMAIN ),
	) );
	genesis_register_sidebar( array(
		'id'          => 'front-page-5',
		'name'        => __( 'Front Page 5', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 5 section.', CHILD_TEXT_DOMAIN ),
	) );
	genesis_register_sidebar( array(
		'id'          => 'front-page-6',
		'name'        => __( 'Front Page 6', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 6 section.', CHILD_TEXT_DOMAIN ),
	) );
	genesis_register_sidebar( array(
		'id'          => 'front-page-7',
		'name'        => __( 'Front Page 7', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This is the front page 7 section.', CHILD_TEXT_DOMAIN ),
	) );
}


/**
 * Count the number of widgets on Front-Page.
 *
 * @since 1.0.0
 *
 * @param  array
 *
 * @return array
 */
function count_widgets( $id ) {

	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}
}

/**
 * Calculate widget area classes.
 *
 * @since 1.0.0
 *
 * @param  int
 *
 * @return string
 */
function widget_area_class( $id ) {

	$count = count_widgets( $id );

	$class = '';

	if ( $count == 1 ) {
		$class .= ' widget-full';
	} elseif ( $count % 3 == 1 ) {
		$class .= ' widget-thirds';
	} elseif ( $count % 4 == 1 ) {
		$class .= ' widget-fourths';
	} elseif ( $count % 2 == 0 ) {
		$class .= ' widget-halves uneven';
	} else {
		$class .= ' widget-halves';
	}

	return $class;

}
