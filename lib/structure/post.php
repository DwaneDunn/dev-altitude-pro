<?php

/**
 *  Post Structure Handling
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
