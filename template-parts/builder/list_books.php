<?php 
	$list = get_sub_field( 'list' );
	$args = [
		'post_type'      => 'book',
		'posts_per_page' => 10,
		'orderby'        => 'title',
		'order'          => 'ASC',
	];

	if ( !empty( $list ) ) {
		$args['post__in'] = $list;
		$args['posts_per_page'] = -1;
	}

	$query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ): ?>

	<section class="m-list-books c-block">
		<div class="container">

			<div class="swiper swiper-book">
				<div class="swiper-wrapper">

					<?php while ( $query->have_posts() ) : 
						$query->the_post(); ?>

						<div class="swiper-slide">
							<?php get_template_part( 'template-parts/article' ); ?>
						</div>

					<?php 
						endwhile; 
						wp_reset_postdata(); 
					?>
					
				</div>
				
				<div class="swiper-pagination"></div>
			</div>
		</div>
		
	</section>

<?php endif; ?>
