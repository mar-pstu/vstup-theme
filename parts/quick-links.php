<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


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