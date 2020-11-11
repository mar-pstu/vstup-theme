<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$videos = get_theme_mod( 'videos' );
$title = '';
$content = '';
$permalink = '';
$name = 'videos';
$youtube_url = '';

$socials = get_theme_mod( 'socials' );


if ( is_array( $videos ) && ! empty( $videos ) ) {

	$titles = [];
	$items = [];

	for ( $i=0; $i<3 ; $i++ ) { 
		if ( isset( $videos[ $i ] ) && is_array( $videos[ $i ] ) ) {
			$videos[ $i ] = array_merge( [
				'label'     => sprintf( __( 'Видео %d', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'description' => '',
				'permalink' => '',
				'thumbnail' => '',
			], $videos[ $i ] );
			if ( ! empty( trim( $videos[ $i ][ 'permalink' ] ) ) ) {
				$titles[] = sprintf(
					'<li class="videos__title title"><a class="%1$s" href="#video-item-%2$s"><span>%3$s</span></a></li>',
					( 0 == $i ) ? 'active' : 'inactive',
					$i,
					$videos[ $i ][ 'label' ]
				);
				if ( ! empty( $videos[ $i ][ 'thumbnail' ] ) ) {
					$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $videos[ $i ][ 'thumbnail' ] ) );
					if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
						$videos[ $i ][ 'thumbnail' ] = wp_get_attachment_image_url( $thumbnail_id, 'large', false );
					}
				}
				if ( empty( $videos[ $i ][ 'thumbnail' ] ) ) {
					$videos[ $i ][ 'thumbnail' ] = get_theme_file_uri( 'images/preview.jpg' );
				}
				extract( $videos[ $i ] );
				ob_start();
				include get_theme_file_path( 'views/home/videos-for-item.php' );
				$items[] = ob_get_contents();
				ob_end_clean();
			}
		}
	}

	if ( ! empty( $titles ) && ! empty( $items ) ) {
		$content = '<ul class="list-unstyles list-inline text-center">' . implode( "\r\n", $titles ) . '</ul>' . implode( "\r\n", $items );
		include get_theme_file_path( 'views/home/videos.php' );
	}


}