<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 */
function _jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', '_jetpack_setup' );
