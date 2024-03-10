<?php
/**
 * Restoring the classic Widgets Editor
 *
 * @package it_booker
 */

/**
 * Theme support hook function
 *
 * @return void
 */
function itm_theme_support() {
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'itm_theme_support' );
