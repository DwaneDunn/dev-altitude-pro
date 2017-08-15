<?php

/**
 *  Post Structure Handling
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 */

namespace KnowITMedia\DevAltitudePro;

/**
 * Unregister post callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_post_callbacks() {

	// Relocate the post info.
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

}

// Relocate the post info.
add_action( 'genesis_entry_header', 'genesis_post_info', 6 ); // Was 5 from StudioPress

add_filter( 'genesis_post_info', __NAMESPACE__ . '\customize_post_info_filter' );
/**
 * Customize the entry meta in the entry header.
 *
 * @since 1.0.0
 *
 * @param $post_info
 *
 * @return string
 */
function customize_post_info_filter( $post_info ) {

  $post_info = '[post_date format="M d Y"] [post_edit]';

  return $post_info;

}

add_filter( 'genesis_post_meta', __NAMESPACE__ . '\customize_post_meta_filter' );
/**
 * Customize the entry meta in the entry footer.
 *
 * @since 1.0.0
 *
 * @param $post_meta
 *
 * @return string
 */
function customize_post_meta_filter( $post_meta ) {

  $post_meta = 'by [post_author_posts_link] [post_categories before=" &middot; in: "]  [post_tags before=" &middot; tags: "]';

  return $post_meta;

}

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\setup_author_box_gravatar_size' );
/**
 * Modify the size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function setup_author_box_gravatar_size( $size ) {

	return 176;

}


//add_action( 'genesis_entry_header', __NAMESPACE__ . '\ktc_show_event_table', 1 );
/**
 * Let's look inside of the event registry table for the event name
 * 'genesis_after_entry'.  `$wp_filter` is the global variable for
 * the event registry within the WordPress Plugin API.
 *
 * @since 1.0.0
 *
 * @return void
 */
function ktc_show_event_table() {
	global $wp_filter;

	d( $wp_filter['genesis_entry_header'] );
}
