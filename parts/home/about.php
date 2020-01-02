<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( VSTUP_SLUG . '_about_title', get_bloginfo( 'name' ) );
$description = get_theme_mod( VSTUP_SLUG . '_about_description', get_bloginfo( 'description' ) );
$label = get_theme_mod( VSTUP_SLUG . '_about_label', __( 'Подробней', VSTUP_TEXTDOMAIN ) );
$thumbnail_src = get_theme_mod( VSTUP_SLUG . '_about_thumbnail', get_custom_logo_src( 'large' ) );
$thumbnail_alt = ( empty( $thumbnail_src ) ) ? get_bloginfo( 'name' ) : get_post_meta( attachment_url_to_postid( $thumbnail_src ), '_wp_attachment_image_alt', true );
$page_id = get_translate_id( get_theme_mod( VSTUP_SLUG . '_about_page_id', '' ), 'page' );
$permalink = ( empty( $page_id ) ) ? __return_empty_string() : get_permalink( $page_id );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$description = pll__( $description );
	$label = pll__( $label );
}


include get_theme_file_path( 'views/home/about.php' );