<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрирует дополнительніе размері миниатюр, которые используются в теме
 * */
function register_image_sizes() {
	add_image_size( 'thumbnail-medium', 600, 400, true, [ 'center', 'center' ] );
}

add_action( 'after_setup_theme', 'vstup\register_image_sizes' );


/**
 * Регистрирует названия новых размеров
 * */
function register_image_labels( $sizes ) {
	return array_merge( $sizes, [
		//
	] );
}

add_filter( 'image_size_names_choose', 'vstup\register_image_labels' );