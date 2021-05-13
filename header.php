<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$body_classes = [];

if ( wp_is_mobile() ) {
	$body_classes[] = 'is-mobile';
}


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class( $body_classes ); ?> data-nav="inactive">
		<?php echo get_theme_mod( 'additionalscriptsbody' ); ?>
		<?php get_template_part( 'parts/mobilenav' ); ?>
		<div class="wrapper" id="wrapper">
			<header id="header" class="wrapper__item wrapper__item--header header">
				<div class="line line--panel">
					<div class="container wrap">
						<?php
							get_template_part( 'parts/quick-links' );
							get_template_part( 'parts/lists/socials' );
							get_template_part( 'parts/lists/contacts' );
							get_template_part( 'parts/search-modal' );
							get_template_part( 'parts/languages-list' );
						?>
					</div>
				</div>
				<div class="line line--nav">
					<div class="container wrap">
						<a class="custom-logo-link" href="<?php echo  home_url( '/' ); ?>">
							<?php if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) : ?>
								<img
									class="custom-logo"
									src="<?php echo wp_get_attachment_image_url( $custom_logo_id, 'medium', false ); ?>"
									alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
								>
							<?php endif; ?>
							<div class="blog-name blog-name--full hide">
								<?php
									$header_blog_name = get_theme_mod( 'header_blog_name_full' );
									if ( empty( trim( $header_blog_name ) ) ) {
										$header_blog_name = get_bloginfo( 'name' );
									}
									echo $header_blog_name;
								?>
							</div>
							<div class="blog-name blog-name--short">
								<?php echo get_theme_mod( 'header_blog_name_shorts' ); ?>
							</div>
						</a>
						<nav class="nav">
							<?php
								if ( has_nav_menu( 'main' ) )  wp_nav_menu( [
									'theme_location'  => 'main',
									'menu'            => 'main',
									'container'       => false,
									'container_class' => '',
									'container_id'    => 'nav',
									'menu_class'      => 'nav__list list text-center',
									'menu_id'         => '',
									'echo'            => true,
									'depth'           => 3,
								] );
							?>
							<button class="nav__burger burger navtoggle hide">
								<span class="sr-only"><?php _e( 'Меню', VSTUP_TEXTDOMAIN ); ?></span>
								<svg class="icon" enable-background="new 0 0 451.111 451.111" viewBox="0 0 451.111 451.111">
									<path d="m0 0h451.111v64.444h-451.111z" transform="translate(1 1)"/>
									<path d="m0 193.333h451.111v64.444h-451.111z" transform="translate(1 7)"/>
									<path d="m0 386.667h451.111v64.444h-451.111z" transform="translate(1 13)"/>
								</svg>
							</button>
						</nav>
					</div>
				</div>
			</header>
			<?php

				$main_bgi = false;

				if ( is_front_page() ) {
					$main_bgi = get_theme_file_uri( 'images/bg.svg' );
				}

			?>
			<main
				class="wrapper__item wrapper__item--main main lazy"
				id="main"
				<?php echo ( $main_bgi ) ? 'data-src="' . $main_bgi . '"' : ''; ?>
			>