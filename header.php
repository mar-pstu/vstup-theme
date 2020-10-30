<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class(); ?> data-nav="inactive">
		<?php get_template_part( 'parts/mobilenav' ); ?>
		<div class="wrapper" id="wrapper">
			<header id="header" class="wrapper__item wrapper__item--header header">
				<div class="line line--panel">
					<div class="container wrap">
						<?php
							get_template_part( 'parts/quick-links' );
							get_template_part( 'parts/lists/socials' );
							get_template_part( 'parts/lists/contacts' );
							get_search_form( true );
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
									src="<?php echo wp_get_attachment_image_url( $custom_logo_id, 'thumbnail', false ); ?>"
									alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
								>
							<?php endif; ?>
							<div class="blog-name"><?php bloginfo( 'name' ); ?></div>
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
							<button class="nav__burger burger navtoggle">
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
			<main class="wrapper__item wrapper__item--main main lazy" id="main" <?php ( is_front_page() ) ? 'data-src="/images/bg.svg"' : ''; ?> >