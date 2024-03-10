<?php
/**
 * Flexible Content
 *
 * @package it_book
 */

$index = 1;
// loop over the ACF flexible fields of this page / post.
while ( have_rows( 'builder' ) ) :
	the_row();
	// load the layout from sub folder.
	get_template_part( 'template-parts/builder/' . get_row_layout(), null, [ 'index' => $index ] );
	$index++;
endwhile;
