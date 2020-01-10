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
	'specialties_permalink',
	'specialties_title',
	'specialties_excerpt',
	'specialties_label',
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

if ( is_array( $slides ) && ! empty( $slides ) ) {
	for ( $i = 0; $i < get_theme_mod( VSTUP_SLUG . '_firstscreen_number', 5 ); $i++ ) {
		foreach ( array( 'title', 'excerpt', 'permalink', 'label' ) as $key ) {
			if ( isset( $slides[ $i ][ $key ] ) && ! empty( trim( $slides[ $i ][ $key ] ) ) ) {
				pll_register_string( "firstscreen_{$i}_{$key}", $slides[ $i ][ $key ], VSTUP_TEXTDOMAIN, false );
			}
		}
	}
}




/**
 * Регистрация строк "Услуг"
 * */
$services = get_theme_mod( VSTUP_SLUG . '_services_items', __return_empty_array() );

if ( is_array( $services ) && ! empty( $services ) ) {
	for ( $i=0;  $i<get_theme_mod( VSTUP_SLUG . '_services_items_number', 6 );  $i++ ) { 
		if ( isset( $services[ $i ] ) ) {
			foreach ( array( 'title', 'permalink' ) as $key ) {
				if ( isset( $services[ $i ][ $key ] ) ) {
					pll_register_string( "services_{$i}_{$key}", $services[ $i ][ $key ], VSTUP_TEXTDOMAIN, false );
				}
			}
		}
	}
	unset( $service );
}




/**
 * Регистрация переводов "Выпускников"
 * */
$graduates = get_theme_mod( VSTUP_SLUG . '_graduates', __return_empty_array() );
if ( is_array( $graduates ) && ! empty( $graduates ) ) {
	for ( $i = 0; $i < get_theme_mod( VSTUP_SLUG . '_graduates_number', 5 ); $i++ ) {
		$graduate = array_merge( array(
			'name'      => '',
			'excerpt'   => '',
			'specialty' => array(
				'title'      => '',
				'thumbnail'  => '',
			),
		), $graduates[ $i ] )
		if ( ! empty( $graduate[ 'name' ] ) ) pll_register_string( "gradute_{$i}_name", $graduate[ 'name' ], VSTUP_TEXTDOMAIN, false );
		if ( ! empty( $graduate[ 'excerpt' ] ) ) pll_register_string( "gradute_{$i}_name", $graduate[ 'excerpt' ], VSTUP_TEXTDOMAIN, false );
		if ( ! empty( $graduate[ 'specialty' ][ 'title' ] ) ) pll_register_string( "gradute_{$i}_specialty_title", $graduate[ 'specialty' ][ 'title' ], VSTUP_TEXTDOMAIN, false );
		if ( ! empty( $graduate[ 'specialty' ][ 'thumbnail' ] ) ) pll_register_string( "gradute_{$i}_specialty_thumbnail", $graduate[ 'specialty' ][ 'thumbnail' ], VSTUP_TEXTDOMAIN, false );
	}
	unset( $graduate );
}