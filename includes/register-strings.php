<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



/**
 * Перевод сблоков
 * */
foreach ( array(
	'about_title',
	'about_label',
	'about_description',
	"news_title",
	"action_title",
	'action_description',
	'action_label',
	'people_title',
	'people_description',
	'people_label',
	'services_title',
	'services_label',
	'questions_title',
	'questions_form',
) as $key ) {
	$value = wp_strip_all_tags( get_theme_mod( VSTUP_SLUG . '_' . $key, '' ) );
	if ( ! empty( $value ) ) {
		pll_register_string( $key, $value, VSTUP_TEXTDOMAIN, false );
	}
}





/**
 * Регистрация строк слайдера главной страницы
 * */
$slides = get_theme_mod( VSTUP_SLUG . '_firstscreen', __return_empty_array() );

if ( ! empty( $slides ) ) {
	for ( $i = 0; $i < get_theme_mod( VSTUP_SLUG . '_firstscreen_number', 5 ); $i++ ) {
		foreach ( array( 'title', 'excerpt', 'permalink', 'label' ) as $key ) {
			if ( isset( $slides[ $i ][ $key ] ) && ! empty( trim( $slides[ $i ][ $key ] ) ) ) {
				pll_register_string( "firstscreen_{$i}_{$key}", $slides[ $i ][ $key ], VSTUP_TEXTDOMAIN, false );
			}
		}
	}
}