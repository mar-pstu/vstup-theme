<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( VSTUP_SLUG . '_people_title', __( 'Выпускники', VSTUP_TEXTDOMAIN ) );
$label = get_theme_mod( VSTUP_SLUG . '_people_label', __( 'Подробней', VSTUP_TEXTDOMAIN ) );
$page_id = get_theme_mod( VSTUP_SLUG . '_people_page_id', __return_empty_string() );
$permalink = __return_empty_string();
$description = get_theme_mod( VSTUP_SLUG . '_people_description', __return_empty_string() );
$peoples = get_graduate_slider();


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$label = pll__( $label );
	$description = pll__( $description );
}


if ( ! empty( $page_id ) ) {
	$permalink = get_permalink( $page_id );
	if ( empty( $title ) ) {
		$title = get_the_title( $page_id );
	}
	if ( empty( $excerpt ) ) {
		$excerpt = get_the_excerpt( $page_id );
	}
}


include get_theme_file_path( 'views/home/people.php' );