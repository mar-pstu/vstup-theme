<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'about_title' );
$description = get_theme_mod( 'about_description' );
$label = get_theme_mod( 'about_label' );
$thumbnail_src = get_theme_mod( 'about_thumbnail' );
$thumbnail_alt = get_bloginfo( 'name' );

if ( ! empty( $thumbnail_src ) ) {
	$thumbnail_id = attachment_url_to_postid( $thumbnail_src );
	if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
		$thumbnail_src = wp_get_attachment_image_url( $thumbnail_id, 'large', false );
		$thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
	}
}

$page_id = get_theme_mod( 'about_page_id' );
$permalink = ( empty( $page_id ) ) ? '' : get_permalink( $page_id );


include get_theme_file_path( 'views/home/about.php' );