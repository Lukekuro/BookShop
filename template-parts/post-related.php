<?php
/**
 * Related posts template
 *
 * @package it_booker
 */

$args_query  = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post__not_in'   => [ get_the_ID() ],
);

$type = isset( $args[ 'type' ] ) ? $args[ 'type' ] : '';
$post_title = esc_html__( 'Our latest news', 'it_book' );

if ( !empty( $type ) ) {
	$args_query[ 'post_type' ] = $type; 
	$post_title = esc_html__( 'Powiązane książki', 'it_book' );
}

$query = new WP_Query( $args_query ); ?>
<?php if ( $query->have_posts() ) : ?>
	<section class="post-related">
		<h2 class="post-related__title"><?php echo $post_title; ?></h2>
		<div class="row">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<div class="col-md-6 col-lg-4">
					<?php get_template_part( 'template-parts/article' ); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif;
wp_reset_postdata(); ?>
