<?php

/**
 *  Comments Structure Handling
 *
 *  @package    KnowITMedia\DevAltitudePro
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
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
	// Relocate after entry widget.
	remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );

}

// Relocate after entry widget.
add_action( 'genesis_after_entry', 'genesis_after_entry_widget_area', 5 );

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
