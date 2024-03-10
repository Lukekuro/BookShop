<?php
/**
 * ACF Options page
 *
 * @link https://www.advancedcustomfields.com/resources/options-page/
 *
 * @package it_booker
 */

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Theme Settings' );
}

/**
 * AFC Extended thumbnails
 *
 * @link https://wpsocket.com/plugin/acf-extended/faq/
 */
global $acfe_section_builders;
$acfe_section_builders = array(
	// existing flexible content layouts:
	// 'hero',   // example.
);

if ( $acfe_section_builders && count( $acfe_section_builders ) > 0 && is_admin() ) {
	foreach ( $acfe_section_builders as $layout ) {
		add_filter( 'acfe/flexible/thumbnail/layout=' . $layout, 'itm_acf_flexible_layout_thumbnail', 10, 3 );
	}
}

/**
 * Thumbnails path for the layouts
 *
 * @param string $thumbnail - the thumbnail.
 * @param string $field - the field.
 * @param array  $layout - the layout.
 *
 * @return string
 */
function itm_acf_flexible_layout_thumbnail( $thumbnail, $field, $layout ) {
	$layout_name = $layout['name'];
	$path        = ITM_IMG . 'acfe-thumbnails/' . $layout_name . '.jpg'; // recommended image size: 400x320px.

	return $path;
}

/**
 * Add Google Map API key
 */
function itm_acf_init() {
	$google_maps_api_key = get_field( 'google_maps_api_key', 'option' );
	if ( $google_maps_api_key ) {
		acf_update_setting( 'google_api_key', $google_maps_api_key );
	}
}
add_action( 'acf/init', 'itm_acf_init' );

/**
 * Sanitize Anchor ID field before saving
 *
 * @param int $post_id - The post ID.
 */
function itm_acf_sanitize_anchor_id( $post_id ) {

	$builder = get_field( 'builder', $post_id );
	if ( ! empty( $builder ) ) {
		foreach ( $builder as $k => $row ) {
			if ( 'anchor' === $row['acf_fc_layout'] ) {
				$value     = $row['anchor_id'];
				$new_value = sanitize_title( $value );
				update_post_meta( $post_id, 'builder_' . $k . '_anchor_id', $new_value );
			}
		}
	}
}
add_action( 'acf/save_post', 'itm_acf_sanitize_anchor_id' );

/**
 * Disable ACFE Modules that not needed
 */
function itm_acfe_modules() {
	acf_update_setting( 'acfe/modules/ui', false );
	acf_update_setting( 'acfe/modules/taxonomies', false );
	acf_update_setting( 'acfe/modules/post_types', false );
	acf_update_setting( 'acfe/modules/author', false );
	acf_update_setting( 'acfe/modules/block_types', false );
	acf_update_setting( 'acfe/modules/forms', false );
	acf_update_setting( 'acfe/modules/multilang', false );
	acf_update_setting( 'acfe/modules/options', false );
	acf_update_setting( 'acfe/modules/options_pages', false );
	acf_update_setting( 'acfe/modules/categories', false );
}
add_action( 'acfe/init', 'itm_acfe_modules' );
