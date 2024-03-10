<?php
/**
 * Disable XMLRPC
 *
 * @package it_book
 */

add_filter( 'xmlrpc_enabled', '__return_false' );
