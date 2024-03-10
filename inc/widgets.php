<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package it_book
 */

if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

/**
 * Widgets init function
 *
 * @return void
 */
function itm_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Footer', 'it_book' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'it_book' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Language switcher', 'it_book' ),
				'id'            => 'language-switcher',
				'description'   => esc_html__( 'Language switcher widget area', 'it_book' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}

add_action( 'widgets_init', 'itm_widgets_init' );
