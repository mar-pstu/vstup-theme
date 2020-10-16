<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


foreach ( [
	[
		'name'   => 'advantages_list',
		'path'   => 'advantages-list',
		'func'   => 'get_advantages_list',
	],
] as $shortcode ) {
	extract( $shortcode );
	include get_theme_file_path( "shortcodes/{$path}.php" );
	add_shortcode( $name, $func );
}