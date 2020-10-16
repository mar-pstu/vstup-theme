<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function sanitize_news_entries_setting( $value, $old_value ) {

	$value = ( is_array( $value ) ) ? array_filter( array_map( function ( $entry ) {
		return parse_only_allowed_args(
			[
				'title' => '',
				'link'  => '',
				'thumbnail' => '',
			],
			$entry,
			[ 'sanitize_text_field', 'esc_url_raw', 'esc_url_raw' ],
			[ 'title', 'link', 'thumbnail' ],
			[ 'title', 'link', 'thumbnail' ]
		);
	}, $value ) ) : [];

	$news_numberentries = get_theme_mod( 'news_numberentries' );

	if ( count( $value ) > $news_numberentries ) {
		$value = array_slice( $value, 0, $news_numberentries );
	}

	return $value;

}

add_filter( 'pre_set_theme_mod_' . 'news_entries', 'vstup\sanitize_news_entries_setting', 10, 2 );