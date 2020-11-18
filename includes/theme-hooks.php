<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Возвращает на список идентификаторов секций главной страницы
 * */
function get_home_parts( $parts = [] ) {
	return array_merge( [
		'firstscreen',
		'about',
		'news',
		'action',
		'faculties',
		'videos',
		'people',
		'services',
		'questions',
	], $parts );
}

add_filter( 'get_home_parts', 'vstup\get_home_parts', 10, 1 );


/**
 * Возвращает на список идентификаторов "списков". Списки используются в шорткодах, секциях главной страницы
 * */
function get_lists_parts( $parts = [] ) {
	return array_merge( [
		'advantages',
		'partners',
		'contacts',
		'socials',
		'graduate-list',
		'list-of-services',
	], $parts );
}

add_filter( 'get_lists_parts', 'vstup\get_lists_parts', 10, 1 );


/**
 * Возвращает на список идентификаторов "частей" темы
 * */
function get_blocks_parts( $parts = [] ) {
	return array_merge( [
		'header',
	], $parts );
}

add_filter( 'get_blocks_parts', 'vstup\get_blocks_parts', 10, 1 );


add_filter('show_admin_bar', '__return_false');


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