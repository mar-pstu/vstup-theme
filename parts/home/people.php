<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'people_title' );
$label = get_theme_mod( 'people_label' );
$page_id = get_theme_mod( 'people_page_id' );
$permalink = '';
$description = get_theme_mod( 'people_description' );


if ( ! empty( $page_id ) ) {
	$permalink = get_permalink( $page_id );
	if ( empty( $title ) ) {
		$title = get_the_title( $page_id );
	}
	if ( empty( $description ) ) {
		$parts = get_extended( get_the_content( '', true, $page_id ) );
		$description = apply_filters( 'the_content', do_shortcode( $parts[ 'main' ], false ) );
	}
}


include get_theme_file_path( 'views/home/people.php' );