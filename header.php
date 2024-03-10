<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package it_book
 */

$logo     = get_field( 'logo', 'option' );
$has_hero = false;
if ( have_rows( 'builder' ) ) {
	while ( have_rows( 'builder' ) ) {
		the_row();
		if ( get_row_layout() === 'hero' ) {
			$has_hero = true;
		}
	}
}
$extra_classes = $has_hero ? 'has-hero' : ''; // page with Hero requires extra header's styling.
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( $extra_classes ); ?> id="top">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'it_book' ); ?></a>

<header class="site-header">
	<div class="container">
		<?php if ( $logo ) : ?>
			<a href="<?php echo esc_url( home_url() ); ?>" class="site-logo" rel="home">
				<?php echo wp_get_attachment_image( $logo, 'medium' ); ?>
			</a>
		<?php endif; ?>

		<nav class="main-nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'main',
					'container_class' => 'main-menu__container',
					'menu_class'      => 'main-menu',
					'depth'           => 2,
					'fallback_cb'     => false,
				)
			);
			?>
		</nav>
		<span class="icon-burger hidden-lg-up" aria-label="<?php esc_html_e( 'Toggle navigation', 'it_book' ); ?>"><i></i></span>
	</div>
</header>

<main class="site-content" id="content">
