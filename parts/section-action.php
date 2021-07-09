<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'actiontitle' );
$excerpt = get_theme_mod( 'actionexcerpt' );
$label = get_theme_mod( 'actionlabel' );
$bgi = get_theme_mod( 'actionbgi' );
$bgc = get_theme_mod( 'actionbgc' );
$thumbnail = get_theme_mod( 'actionthumbnail' );
$video = get_theme_mod( 'actionvideo' );
$page_id = get_theme_mod( 'actionpageid' );
$permalink = ( empty( $page_id ) ) ? '' : get_permalink( $page_id );


add_action( 'get_footer', function () use ( $bgc ) {
	wp_add_inline_style( 'vstup-public', css_array_to_css( [
		'#action' => [
			'background-color' => $bgc,
		]
	] ) );
}, 10, 0 );


include get_theme_file_path( 'views/section-action.php' );