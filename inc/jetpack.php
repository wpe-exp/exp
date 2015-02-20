<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package exp
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function exp_jetpackexpetup() {
	add_themeexpupport( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'afterexpetup_theme', 'exp_jetpackexpetup' );
