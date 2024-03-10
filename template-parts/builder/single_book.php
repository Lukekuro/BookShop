<?php
/**
 * Single book builder part
 *
 * @package it_booker
 */

$book_id        = get_sub_field( 'book_id' );
$permalink_book = get_the_permalink( $book_id );
$title_book     = get_the_title( $book_id );
$text           = get_post_field( 'post_content', $book_id );
$text 		    = wp_trim_words( $text, 30 );
$image          = get_the_post_thumbnail( $book_id, 'large' );
$author_book    = get_field( 'author_book', $book_id );
$year_book      = get_field( 'year_book', $book_id );
$book_category  = get_the_terms( $book_id, 'book-category' );
?>

<section class="m-single_book c-block">
	<div class="container">

		<div class="hidden-md-up">
			<?php get_template_part( 'template-parts/builder/components/title', null, [ 'class' => 'c-title-stroke' ] ); ?>
		</div>

		<div class="row">
			<div class="col-md-5 text-center m-single_book__block-img">
				<?php if ( $image ) : ?>
					<a href="<?php echo esc_url( $permalink_book ); ?>" class="m-single_book__image">
						<?php echo $image; ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="col-md-7 m-single_book__main-block">

				<div class="visible-md-up">
					<?php get_template_part( 'template-parts/builder/components/title', null, [ 'class' => 'c-title-stroke' ] ); ?>
				</div>

				<div class="m-single_book__block">
					<div class="m-single_book__content text-center editor">
						<?php if ( $title_book ) : ?>
							<h2 class="fw-300">
								<a href="<?php echo esc_url( $permalink_book ); ?>" class="c-a-line c-a-line__primary color-white">
									<?php echo wp_kses_post( $title_book ); ?>
								</a>
							</h2>
						<?php endif; ?>

						<?php if ( $text ) : ?>
							<p><?php echo wp_kses_post( $text ); ?></p>
						<?php endif; ?>

						<a class="btn btn-white" href="<?php echo esc_url( $permalink_book ); ?>"><?php esc_html_e( 'Czytaj więcej', 'it_book' ); ?></a>
					</div>
				</div>

			</div>
		</div>

		<div class="row justify-content-lg-end justify-content-center">
			<div class="col-lg-7">
				<div class="m-single_book__wrap">
					<?php if ( $author_book ) : ?>
						<div class="m-single_book__wrap__item">	
							<span><?php esc_html_e( 'Gatunek', 'it_book' ); ?></span>

							<?php if ( $book_category ) : ?>
								<div>
									<?php foreach ( $book_category as $cat ) : ?>
										<a class="cat-book c-a-underline" href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>"><?php echo wp_kses_post( $cat->name ); ?></a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $author_book ) : ?>
						<div class="m-single_book__wrap__item">	
							<span><?php esc_html_e( 'Autor', 'it_book' ); ?></span>
							<span><?php echo wp_kses_post( $author_book ); ?></span>
						</div>
					<?php endif; ?>

					<?php if ( $year_book ) : ?>
						<div class="m-single_book__wrap__item">
							<span><?php esc_html_e( 'Rok', 'it_book' ); ?></span>
							<span><?php echo wp_kses_post( $year_book ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
</section>
