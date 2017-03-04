<?php

/**
 *  Comments Structure Handling
 *
 *  Checked!
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
 * Unregister comments callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_comments_callbacks() {


}

// Relocate after entry widget.
//remove_action( 'genesis_after_entry', '\genesis_after_entry_widget_area' );
//add_action( 'genesis_after_entry', '\genesis_after_entry_widget_area', 5 );

// Relocate the post info.
//remove_action( 'genesis_entry_header', '\genesis_post_info', 12 );
//add_action( 'genesis_entry_header', 'genesis_post_info', 5 );

///

add_action( 'genesis_entry_header', __NAMESPACE__ . '\ktc_show_event_table', 1 );
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

///

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );
/**
 * Modify the size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param array $size
 *
 * @return array
 */
function setup_comments_gravatar( array $args ) {

  $args['avatar_size'] = 120;

  return $args;

}

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
