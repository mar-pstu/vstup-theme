<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'services_title' );
$label = get_theme_mod( 'services_label' );
$page_id = get_translate_id( get_theme_mod( 'services_page_id', '' ), 'page' );
$permalink = ( empty( $page_id ) ) ? __return_empty_string() : get_permalink( $page_id );
$content = __return_empty_string();
$name = 'services';


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$label = pll__( $label );
}


switch ( get_theme_mod( 'services_ct', 'services' ) ) {

	case 'content':
		$page = get_post( $page_id, OBJECT, 'raw' );
		if ( is_object( $page ) && ! is_wp_error( $page ) ) {
			$content = $page->post_content;
			if ( empty( $title ) ) {
				$title = apply_filters( 'the_title', $page->post_title, $page->ID );
			}
		}
		break;
	
	case 'services':
	default:
		$content = get_services_list();
		break;

}


if ( ! empty( $content ) ) {
	include get_theme_file_path( 'views/home/section.php' );
}