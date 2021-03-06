<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result = [];
$title = '';
$link = '';
$thumbnail_url = VSTUP_URL . 'images/thumbnail.png';
$blog_name = get_bloginfo( 'name' );
if ( is_singular() ) {
	$link = get_permalink( get_the_ID() );
	$title = get_the_title( get_the_ID() );
	$thumbnail_url = ( has_post_thumbnail( get_the_ID() ) ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : $thumbnail_url;
} elseif ( is_front_page() ) {
	$link = get_home_url();
	$title = get_bloginfo( 'name' );
	$thumbnail_url = ( has_header_image() ) ? get_header_image() : $thumbnail_url;
} elseif ( is_search() ) {
	$link = get_search_link( get_search_query() );
	$title = sprintf( __( 'Результаты поиска %s', VSTUP_TEXTDOMAIN ), get_search_query() );
} elseif ( is_date() ) {
	$link = ( ( ! empty( $_SERVER[ 'HTTPS' ] ) ) ? 'https' : 'http' ) . '://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
	$title = get_the_archive_title();
} elseif ( $term_id = get_queried_object()->term_id ) {
	$link = get_term_link( $term_id );
	$title = single_term_title( $term_id, 0 );
}


include get_theme_file_path( 'views/share-before.php' );


foreach ( apply_filters( 'share_items', [] ) as $key => $label ) {
	$link_format = '';
	switch ( $key ) {
		case 'facebook':
			$link_format = apply_filters( 'share_item_link_format_facebook', 'https://www.facebook.com/sharer.php?u=%1$s&amp;t=%2$s' );
			break;
		case 'twitter':
			$link_format = apply_filters( 'share_item_link_format_twitter', 'https://twitter.com/share?url=%1$s&amp;text=%2$s' );
			break;
		case 'linkedin':
			$link_format = apply_filters( 'share_item_link_format_linkedin', 'https://www.linkedin.com/shareArticle?mini=true&url=%1$s&title=%2$s' );
			break;
		case 'email':
			$link_format = apply_filters( 'share_item_link_format_email', 'mailto:info@example.com?&subject=%4$s&body=%2$s %1$s' );
			break;
		default:
			$link_format = apply_filters( 'share_item_link_format_default', '' );
			break;
	}

	$share = sprintf( $link_format, $link, esc_attr( $title ), $thumbnail_url, esc_attr( $blog_name ) );

	include get_theme_file_path( 'views/share-item.php' );

}

include get_theme_file_path( 'views/share-after.php' );