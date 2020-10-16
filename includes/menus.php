<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация меню
 */
function register_theme_nav_menus() {
	register_nav_menus( [
		'main'        => __( 'Главное меню', VSTUP_TEXTDOMAIN ),
		'quick_links' => __( 'Быстрые ссылки (faq, schedule)', VSTUP_TEXTDOMAIN ),
		'warning'     => __( 'Важное', VSTUP_TEXTDOMAIN ),
	] );
}

add_action( 'after_setup_theme', 'vstup\register_theme_nav_menus' );


/**
 * Добавляет класс к родительским пунктам меню
 */
function add_class_to_parent_menu_item( $items ) {
	foreach( $items as $item ) {
		if ( is_nav_has_sub_menu( $item->ID, $items ) ) {
			$item->classes[] = 'has-sub-menu';
		}
	}
	return $items;
}

add_filter( 'wp_nav_menu_objects', 'vstup\add_class_to_parent_menu_item' );