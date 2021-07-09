<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$entry = [
	'usedby'         => true,
	'title'          => get_the_title( get_the_ID() ),
	'bgi'            => [],
	'excerpt'        => ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : '',
	'permalink'      => '',
	'label'          => '',
	'promo_nav_menu' => '',
	'thumbnail_url'  => '',
	'nav_menu'       => get_post_meta( $post->ID, VSTUP_SLUG . '_page_nav_menu', true ),
];

if ( has_post_thumbnail( get_the_ID() ) ) {
	$entry[ 'bgi' ][ 'id' ] = get_post_thumbnail_id( get_the_ID() );
	$entry[ 'bgi' ][ 'url' ] = get_the_post_thumbnail_url( get_the_ID(), ( wp_is_mobile() ) ? 'medium' : 'large' );
}


if ( ! empty( $entry[ 'nav_menu' ] ) ) {
	include get_theme_file_path( 'views/container-after.php' );
	include get_theme_file_path( 'views/entry-jumbotron.php' );
	include get_theme_file_path( 'views/container-before.php' );
} else {
	get_template_part( 'blocks/pageheader.php' );
}