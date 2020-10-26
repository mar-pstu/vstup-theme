<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'action_title' );
$excerpt = get_theme_mod( 'action_excerpt' );
$label = get_theme_mod( 'action_label' );
$bgi = get_theme_mod( 'action_bgi' );
$bgc = get_theme_mod( 'action_bgc' );
$thumbnail = get_theme_mod( 'action_thumbnail' );
$video = get_theme_mod( 'action_video' );
$page_id = get_theme_mod( 'action_page_id' );
$permalink = ( empty( $page_id ) ) ? '' : get_permalink( $page_id );


add_action( 'get_footer', function () use ( $bgc ) {
	wp_add_inline_style( 'vstup-public', css_array_to_css( [
		'#action' => [
			'background-color' => $bgc,
		]
	] ) );
}, 10, 0 );


include get_theme_file_path( 'views/home/action.php' );