<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( VSTUP_SLUG . '_action_title', __( 'Начни с нами', VSTUP_TEXTDOMAIN ) );
$excerpt = get_theme_mod( VSTUP_SLUG . '_action_excerpt', __return_empty_string() );
$label = get_theme_mod( VSTUP_SLUG . '_action_label', __( 'Подробней', VSTUP_TEXTDOMAIN ) );
$bgi = get_theme_mod( VSTUP_SLUG . '_action_bgi', VSTUP_URL . '/images/action/bg.jpg' );
$thumbnail = get_theme_mod( VSTUP_SLUG . '_action_thumbnail', VSTUP_URL . '/images/gerb.png' );
$video = get_theme_mod( VSTUP_SLUG . '_action_video', __return_empty_string() );
$page_id = get_translate_id( get_theme_mod( VSTUP_SLUG . '_action_page_id', __return_empty_string() ), 'page' );
$permalink = ( empty( $page_id ) ) ? __return_empty_string() : get_permalink( $page_id );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$excerpt = pll__( $excerpt );
	$label = pll__( $label );
}



include get_theme_file_path( 'views/home/action.php' );