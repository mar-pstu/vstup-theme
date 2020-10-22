<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


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