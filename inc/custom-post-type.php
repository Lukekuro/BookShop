<?php
/**
 * Custom Post Types registration
 *
 * This is the file where we register all the custom post types.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @link https://developer.wordpress.org/resource/dashicons/
 *
 * @package it_book
 */

?>
<?php
/**
 * Registering Custom post types
 *
 * @return void
 */
function itm_custom_init() {
	// CPT: Books.
	$labels = array(
		'name'          => __( 'Books', 'it_book' ),
		'singular_name' => __( 'Book', 'it_book' ),
	);

	$args = array(
		'label'               => __( 'Book', 'it_book' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,	
		'show_ui'             => true,
		'rest_base'           => '',
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true, // enable Gutenberg for this CPT.
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array(
			'slug'       => 'book',
			'with_front' => true,
		),
		'query_var'           => true,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		// @phpcs:disable // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	);

	register_post_type( 'book', $args );

	// taxonomy: Project Category.
	register_taxonomy(
		'book-category',
		array( 'book' ), /* name of CPT */
		array(
			'labels'            => array(
				'name'          => __( 'Gatunek', 'it_book' ),
				'singular_name' => __( 'Gatunek', 'it_book' ),
				'add_new_item'  => __( 'Dodaj nowy gatunek', 'it_book' ),
			),
			'hierarchical'      => true,     /* if this is true, it acts like categories */
			'show_admin_column' => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'book-category' ),
		)
	);

}

add_action( 'init', 'itm_custom_init' );
