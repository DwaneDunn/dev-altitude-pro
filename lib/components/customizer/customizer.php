<?php

/**
 *  Checked!
 *
 *  Developer Altitude Pro
 *
 *  This file adds the CSS from the Customizer options.
 *
 *  @package    KnowITMedia\DevAltitudePro\Customizer
 *  @since      1.0.0
 *  @author     Dwane Dunn
 *  @link       https://dwanedunn.com
 *  @license    GNU General Public License 2.0+
 *
 */

namespace KnowITMedia\DevAltitudePro\Customizer;

use WP_Customize_Color_Control;
use WP_Customize_Image_Control;

add_action( 'customize_register', __NAMESPACE__ . '\register_with_customizer' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function register_with_customizer( $wp_customize ) {

	$prefix = get_settings_prefix();

	$images = apply_filters( $prefix . '_images', array( '1', '3', '5', '7' ) );

	$wp_customize->add_section(
		$prefix . '-settings', array(
			'description' => __( 'Use the included default images or personalize your site by uploading your own images.<br /><br />The default images are <strong>1600 pixels wide and 1050 pixels tall</strong>.', CHILD_TEXT_DOMAIN ),
			'title'       => __( 'Front Page Background Images', CHILD_TEXT_DOMAIN ),
			'priority'    => 35,
		)
	);

	foreach( $images as $image ) {

		$wp_customize->add_setting(
			$image . '-' . $prefix . '-image',
			array(
				'default'           => sprintf( '%s/assets/images/bg-%s.jpg', CHILD_THEME_URI, $image ),
				'sanitize_callback' => 'esc_url_raw',
				'type'              => 'option',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				$image . '-' . $prefix . '-image',
				array(
					'label'    => sprintf( __( 'Featured Section %s Image:', CHILD_TEXT_DOMAIN ), $image ),
					'section'  => $prefix . '-settings',
					'settings' => $image . '-' . $prefix . '-image',
					'priority' => $image+1,
				)
			)
		);

	}

	// Add the link color picker.
	$wp_customize->add_setting(
		$prefix . '_link_color',
		array(
			'default'           => get_default_link_color(),
			'sanatize_callback' => 'sanatize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_link_color',
			array(
				'description' => __( 'Change the color of links, buttons in content and white front page sections, the hover color of linked titles, the footer widget background color, and more.', CHILD_TEXT_DOMAIN ),
				'label'       => __( 'Link Color', CHILD_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => $prefix . '_link_color',
			)
		)
	);

	// Add the accent color picker.
	$wp_customize->add_setting(
		$prefix . '_accent_color',
		array(
			'default'           => get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_accent_color',
			array(
				'description' => __( 'Change the color of buttons used in front page image sections, the focus color of mobile menu buttons, and the hover color for footer links.', CHILD_TEXT_DOMAIN ),
				'label'       => __( 'Accent Color', CHILD_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => $prefix . '_accent_color',
			)
		)
	);

}
