<?php
/**
 * Article template part
 *
 * @package it_booker
 */

$author_book = get_field( 'author_book', get_the_id() );
$year_book   = get_field( 'year_book', get_the_id() );
?>

<article class="article">
	<h3 class="article__title text-lg fw-400">
		<a href="<?php the_permalink(); ?>" class="c-a-line">
			<?php the_title(); ?>
		</a>
	</h3>

	<div class="article__block">
		<a class="article__thumbnail" href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php else : ?>
				<?php itm_image_placeholder(); ?>
			<?php endif; ?>
		</a>

		<div class="article__content">
			<div class="article__excerpt"><?php itm_excerpt( 15 ); ?></div>
	
			<div class="entry-meta">

				<?php if ( $author_book && $year_book ) : ?>
					<div class="entry-meta__author-year">
						<?php if ( $author_book ) : ?>
							<span><?php echo wp_kses_post( $author_book ); ?>,</span>
						<?php endif; ?>
		
						<?php if ( $year_book ) : ?>
							<span><?php echo wp_kses_post( $year_book ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
					
				<?php itm_term_cat_book_by_id( get_the_id() ); ?>
			</div>
		</div>
	</div>

	<a class="btn btn-black btn-sm article__more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Czytaj więcej', 'it_book' ); ?></a>

</article>
