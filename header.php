<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body class="front-page" data-nav="inactive">
		<?php get_template_part( 'parts/mobilenav' ); ?>
		<div class="wrapper" id="wrapper">
			<header class="wrapper__item wrapper__item--header header">
				<div class="line line--panel">
					<div class="container wrap">
						<ul class="links list-inline">
							<li><a class="faq" href="#"><span class="label">Вопросы ответы</span></a></li>
							<li><a class="schedule" href="#"><span class="label">Расписание</span></a></li>
						</ul>
						<ul class="links socials list-inline">
							<li><a class="facebook" href="#"><span class="sr-only">facebook</span></a></li>
							<li><a class="twitter" href="#"><span class="sr-only">twitter</span></a></li>
							<li><a class="instagram" href="#"><span class="sr-only">instagram</span></a></li>
							<li><a class="youtube" href="#"><span class="sr-only">youtube</span></a></li>
						</ul>
						<ul class="links contacts list-inline">
							<li><a class="phone" href="tel:380629343097"><span class="label">(0629) 34-30-97</span></a></li>
							<li><a class="email" href="mailto:priem@pstu.edu"><span class="label">priem@pstu.edu</span></a></li>
						</ul>

						<?php
							get_search_form( true );
							echo get_languages_list( array(
								'container_class' => 'languages list-inline',
							) );
						?>
					</div>
				</div>
				<div class="line line--nav">
					<div class="container wrap">
						<a class="custom-logo-link" href="<?php echo  home_url( '/' ); ?>">
							<?php echo get_custom_logo_img(); ?>
							<div class="blog-name"><?php bloginfo( 'name' ); ?></div>
						</a>
						<nav class="nav">
							<?php
								if ( has_nav_menu( 'main' ) )  wp_nav_menu( array(
									'theme_location'  => 'main',
									'menu'            => 'main',
									'container'       => false,
									'container_class' => '',
									'container_id'    => 'nav',
									'menu_class'      => 'nav__list list',
									'menu_id'         => '',
									'echo'            => true,
									'depth'           => 3,
								) );
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