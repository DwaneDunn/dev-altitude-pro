/**
 * This script adds the jquery effects to the Altitude Pro Theme.
 *
 * @package KnowITMedia\DevAltitudePro\Assets\JS
 * @author StudioPress
 * @license GPL-2.0+
 */

jQuery(function( $ ){

	if( $( document ).scrollTop() > 0 ){
		$( '.site-header' ).addClass( 'dark' );
	}

	// Add opacity class to site header.
	$( document ).on('scroll', function(){

		if ( $( document ).scrollTop() > 0 ){
			$( '.site-header' ).addClass( 'dark' );

		} else {
			$( '.site-header' ).removeClass( 'dark' );
		}

	});

});
