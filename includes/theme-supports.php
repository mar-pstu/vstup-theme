<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * 
 * */
function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
	add_image_size( 'thumbnail-3x2', 600, 400, true ); // размер миниатюры 3x2 с жестким кадрированием
	add_filter( 'image_size_names_choose', function ( $sizes ) {
		return array_merge( $sizes, [
			'thumbnail-3x2' => __( '2x3 жесткое кадрирование', VSTUP_TEXTDOMAIN ),
		] );
	}, 10, 1 );
}

add_action( 'after_setup_theme', 'vstup\theme_supports' );


/**
 * Возвращает список социальных сетей для кнопок "поделиться"
 * */
function get_share_items( $items = [] ) {
	return array_merge( [
		'facebook' => __( 'Поделиться в Facebook', VSTUP_TEXTDOMAIN ),
		'twitter'  => __( 'Поделиться в Twitter', VSTUP_TEXTDOMAIN ),
		'linkedin' => __( 'Поделиться в LinkedIn', VSTUP_TEXTDOMAIN ),
		'email'    => __( 'Отправить по email', VSTUP_TEXTDOMAIN ),
	], $items );
}

add_filter( 'share_items', 'vstup\get_share_items', 10, 1 );