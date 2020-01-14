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
			<header class="wrapper__item wrapper__item--header header">
				<div class="line line--panel">
					<div class="container wrap">
						<?php
							// вывод меню быстрых ссылок
							$nav_menu_locations = get_nav_menu_locations();
							if ( $nav_menu_locations && isset( $nav_menu_locations[ 'quick_links' ] ) ) {
								$quick_links = wp_get_nav_menu_items( $nav_menu_locations[ 'quick_links' ] );
								if ( is_array( $quick_links ) && ! empty( $quick_links ) ) {
									$quick_links = wp_list_filter( $quick_links, array( 'menu_item_parent' => 0 ), 'AND' );
									?>
										<ul class="links list-inline">
									<?
										foreach ( $quick_links as $quick_link ) {
											printf(
												'<li><a class="%1$s" href="%2$s" title="%3$s"><span class="label">%4$s</span></a></li>',
												implode( " ", $quick_link->classes ),
												esc_attr( $quick_link->url ),
												esc_attr( $quick_link->description ),
												$quick_link->title
											);
										}
									?>
										</ul>
									<?
								}
							}
							// вывод списка социальных сетей
							$socials = get_theme_mod( VSTUP_SLUG . "_socials", array() );
							if ( is_array( $socials ) && ! empty( $socials ) ) {
								$socials_items = __return_empty_array();
								foreach ( $socials as $key => $link ) {
									if ( ! empty( trim( $link ) ) ) {
										$socials_items[] = sprintf(
											'<li><a class="%1$s" href="%2$s"><span class="sr-only">%1$s</span></a></li>',
											$key,
											esc_attr( $link )
										);
									}
								}
								if ( ! empty( $socials_items ) ) {
									echo '<ul class="links socials list-inline">' . implode( "\r\n", $socials_items ) . '</ul>';
								}
							}
							// вывод списка контактов
							$contacts = get_theme_mod( VSTUP_SLUG . "_contacts", array() );
							if ( is_array( $contacts ) && ! empty( $contacts ) ) {
								$contacs_items = __return_empty_array();
								foreach ( $contacts as $key => $link ) {
									if ( ! empty( trim( $link ) ) ) {
										$scheme = __return_empty_string();
										$label = __return_empty_string();
										switch ( $key ) {
											case 'phone':
												$scheme = 'tel:';
												$label = '';
												break;
											case 'email':
												$scheme = 'mailto:';
												break;
											default:
												$scheme = 'https://';
												$label = '';
												break;
										}
										$contacs_items[] = sprintf(
											'<li><a class="%1$s" href="%2$s%3$s"><span class="label">%4$s</span></a></li>',
											$key,
											$scheme,
											esc_attr( $link ),
											$link
										);
									}
								}
								if ( ! empty( $contacs_items ) ) {
									echo '<ul class="links contacts list-inline">' . implode( "\r\n", $contacs_items ) . '</ul>';
								}
							}
							// вывод формы поиска
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