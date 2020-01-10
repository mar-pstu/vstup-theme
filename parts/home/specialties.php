<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! post_type_exists( 'educational_program' ) || ! taxonomy_exists( 'specialties' ) ) { return; }


$title = get_theme_mod( VSTUP_SLUG . "_specialties_title", __( 'Специальности', VSTUP_TEXTDOMAIN ) );
$excerpt = get_theme_mod( VSTUP_SLUG . '_specialties_excerpt', '' );
$permalink = get_theme_mod( VSTUP_SLUG . '_specialties_permalink', get_post_type_archive_link( 'educational_program' ) );
$label = get_theme_mod( VSTUP_SLUG . '_specialties_label', __( 'Все специальности', VSTUP_TEXTDOMAIN ) );
$specialties = get_specialties_slider( array(
	'wrap' => 0,
) );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$excerpt = pll__( $excerpt );
	$label = pll__( $label );
}



include get_theme_file_path( 'views/home/specialties.php' );