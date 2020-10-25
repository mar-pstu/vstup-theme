<?php




if ( $post_id ) { $post_id = get_the_ID(); }
$format = __return_empty_string();
$result = __return_empty_array();
$title = __return_empty_string();
$link = __return_empty_string();
$thumbnail_url = VSTUP_URL . 'images/thumbnail.png';
$blog_name = get_bloginfo( 'name' );
if ( $post_id || is_singular() ) {
	$link = get_link( $post_id );
	$title = get_the_title( $post_id );
	$thumbnail_url = ( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, 'medium' ) : $thumbnail_url;
} elseif ( is_front_page() ) {
	$link = get_home_url();
	$title = get_bloginfo( 'name' );
	$thumbnail_url = ( has_header_image() ) ? get_header_image() : $thumbnail_url;
} elseif ( is_search() ) {
	$link = get_search_link( get_search_query() );
	$title = sprintf( __( 'Результаты поиска %s', VSTUP_TEXTDOMAIN ), get_search_query() );
} elseif ( $term_id = get_queried_object()->term_id ) {
	$link = get_term_link( $term_id );
	$title = single_term_title( $term_id, 0 );
}


include get_theme_file_path( 'views/share-before.php' );


foreach ( apply_filters( 'share_items', [] ) as $key => $label ) {
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

	$link = sprintf( $link_format, $link, esc_attr( $title ), $thumbnail_url, esc_attr( $blog_name ) );

	include get_theme_file_path( 'views/share-item.php' );

}

include get_theme_file_path( 'views/share-after.php' );