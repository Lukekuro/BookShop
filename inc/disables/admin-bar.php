<?php
/**
 * Admin Bar modifications
 *
 * @package it_book
 */

/**
 * Remove WP logo
 */
function itm_clear_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'itm_clear_admin_bar' );
