<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_the_title( get_the_ID() );
$bgi = ( has_post_thumbnail( get_the_ID() ) ) ? get_the_post_thumbnail_url( get_the_ID(), ( wp_is_mobile() ) ? 'medium' : 'large' ) : '';
$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : '';
$permalink = '';
$label = '';
$page_menu = '';
$thumbnail_url = '';

// получаем список подстраниц

// получаем пункты прикреплённого меню
$promo_nav_menu = get_post_meta( $post->ID, VSTUP_SLUG . '_page_nav_menu', true );

if ( ! empty( $promo_nav_menu ) ) {
	include get_theme_file_path( 'views/container-after.php' );
	include get_theme_file_path( 'views/jumbotron.php' );
	include get_theme_file_path( 'views/container-before.php' );
} else {
	include get_theme_file_path( 'views/pageheader.php' );
}