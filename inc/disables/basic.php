<?php
/**
 * General recommended updates
 *
 * @package it_book
 */

/**
 * Remove WordPress version from head tag
 */
remove_action( 'wp_head', 'wp_generator' );
