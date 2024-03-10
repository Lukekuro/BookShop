<?php
/**
 * Title component builder part
 *
 * @package it_booker
 */

$title_class     = isset( $args[ 'class' ] ) ? $args[ 'class' ] : 'h2';
$title_text      = get_sub_field( 'title' );
$title_tag       = ! empty( get_sub_field( 'title_tag' ) ) ? get_sub_field( 'title_tag' ) : 'h2'; // possible values: h1-h6, span.
$title_alignment = get_sub_field( 'title_alignment' ) ? get_sub_field( 'title_alignment' ) : 'left'; // possible values: left, center, right.
if ( $title_text ) {
	echo sprintf(
		'<%s class="c-title %s text-%s">%s</%s>',
		esc_attr( $title_tag ),
		esc_attr( $title_class ),
		esc_attr( $title_alignment ),
		wp_kses_post( $title_text ),
		esc_attr( $title_tag )
	);
}
