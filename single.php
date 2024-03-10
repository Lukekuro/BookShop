<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package it_book
 */

get_header();
the_post();
$author_book   = get_field( 'author_book', get_the_id() );
$year_book     = get_field( 'year_book', get_the_id() );
$book_category = get_the_terms( get_the_id(), 'book-category' );
?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<div class="container post-container">
		<h1 class="post-title text-center"><?php the_title(); ?></h1>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( '1536x1536' ); ?>
			</div>
		<?php endif; ?>

		<div class="row justify-content-center">
			<div class="col-lg-9">

				<header class="post-header">
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

						<?php if ( $book_category ) : ?>
							<div class="post-list-cat">
								<?php foreach ( $book_category as $cat ) : ?>
									<a class="cat-book c-a-underline" href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>"><?php echo wp_kses_post( $cat->name ); ?></a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</header>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'it_book' ),
							'after'  => '</div>',
						)
					);
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div>

			</div>
		</div>
	</div>

	<div class="post__links">
		<?php 
			$nextPost = get_next_post();
			$prevPost = get_previous_post();

			if ($prevPost) {
				?>
					<div class="post__links__prev">
						<?php
							$prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
							previous_post_link( '%link',"$prevThumbnail <div class='items'><span>". esc_html__( 'Poprzedni', 'it_book' ) . "</span><div class='link-title'><span class='h3'>%title</span><svg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 39 12'><line class='top' x1='18' y1='-5.5' x2='29.5' y2='7' stroke='#ffffff;'></line><line class='bottom' x1='18' y1='17.5' x2='29.5' y2='5' stroke='#ffffff;'></line></svg></div></div>" ); 
						?>
					</div>
				<?php
			}

			if ($nextPost) {
				?>
				
					<div class="post__links__next">
						<?php
							$nextThumbnail = get_the_post_thumbnail( $nextPost->ID );
							next_post_link( '%link',"$nextThumbnail <div class='items'><span>". esc_html__( 'Następny', 'it_book' ) . "</span><div class='link-title'><span class='h3'>%title</span><svg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 39 12'><line class='top' x1='18' y1='-5.5' x2='29.5' y2='7' stroke='#ffffff;'></line><line class='bottom' x1='18' y1='17.5' x2='29.5' y2='5' stroke='#ffffff;'></line></svg></div></div>" ); 
						?>
					</div>
				<?php
			}
		?>
	</div>

	<div class="container">
		<?php if ( is_singular( 'book' ) ) : ?>
			<?php get_template_part( 'template-parts/post-related', null, [ 'type' => 'book' ] ); ?>
		<?php else: ?>
			<?php get_template_part( 'template-parts/post-related' ); ?>
		<?php endif; ?>
	</div>

<?php
get_footer();
