<?php
/**
 * Disable wp-embed.js
 *
 * @package it_booker
 */

/**
 * Deregister all embed
 *
 * @return void
 */
function itm_wpembed_deregister_scripts() {
	wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'itm_wpembed_deregister_scripts' );
