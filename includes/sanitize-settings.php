<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


// /**
//  * Очистка новостей (главная страница)
//  * */
// function sanitize_news_entries_setting( $value, $old_value = [] ) {
// 	$value = ( is_array( $value ) ) ? array_filter( array_map( function ( $entry ) {
// 		return parse_only_allowed_args(
// 			[
// 				'title' => '',
// 				'link'  => '',
// 				'thumbnail' => '',
// 			],
// 			$entry,
// 			[ 'sanitize_text_field', 'esc_url_raw', 'esc_url_raw' ],
// 			[ 'title', 'link', 'thumbnail' ],
// 			[ 'title', 'link', 'thumbnail' ]
// 		);
// 	}, $value ) ) : [];
// 	$news_numberentries = get_theme_mod( 'news_numberentries' );
// 	if ( count( $value ) > $news_numberentries ) {
// 		$value = array_slice( $value, 0, $news_numberentries );
// 	}
// 	return $value;
// }

// add_filter( 'pre_set_theme_mod_' . 'news_entries', 'vstup\sanitize_news_entries_setting', 10, 2 );


/**
 * Очитска категорий новостей
 * */
function sanitize_news_categories_setting( $value, $old_value = [] ) {
	$value = ( is_array( $value ) ) ? array_filter( array_map( 'absint', $value ) ) : [];
	$news_terms_number = get_theme_mod( 'news_terms_number' );
	if ( count( $value ) > $news_terms_number ) {
		$value = array_slice( $value, 0, $news_terms_number );
	}
	return $value;
}

add_filter( 'pre_set_theme_mod_' . 'news_categories', 'vstup\sanitize_news_categories_setting', 10, 2 );