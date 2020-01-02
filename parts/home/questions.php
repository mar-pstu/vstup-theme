<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( VSTUP_SLUG . '_questions_title', __( 'Остались вопросы? Звони или пиши нам!', VSTUP_TEXTDOMAIN ) );
$bgi = get_theme_mod( VSTUP_SLUG . '_questions_bgi', VSTUP_URL . '/images/questions/bg.jpg' );
$form = get_theme_mod( VSTUP_SLUG . '_questions_form', '' );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
}


include get_theme_file_path( 'views/home/questions.php' );