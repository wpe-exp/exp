<?php
/**
 * exp Theme Customizer
 *
 * @package exp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function exp_customize_register( $wp_customize ) {
	$wp_customize->getexpetting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->getexpetting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->getexpetting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'exp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function exp_customize_preview_js() {
	wp_enqueueexpcript( 'exp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'exp_customize_preview_js' );
