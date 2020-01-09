<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$videos = get_theme_mod( VSTUP_SLUG . '_videos', __return_empty_array() );
$title = __return_empty_string();
$content = __return_empty_string();
$permalink = __return_empty_string();
$name = 'videos';


if ( is_array( $videos ) && ! empty( $videos ) ) {

	$titles = __return_empty_array();
	$items = __return_empty_array();

	for ( $i=0; $i<3 ; $i++ ) { 
		if ( isset( $videos[ $i ] ) && is_array( $videos[ $i ] ) ) {
			$videos[ $i ] = array_merge( array(
				'label'     => sprintf( __( 'Видео %d', VSTUP_TEXTDOMAIN ), ( $i + 1 ) ),
				'url'       => '',
				'thumbnail' => VSTUP_URL . 'images/preview.jpg',
			), $videos[ $i ] );
			if ( ! empty( trim( $videos[ $i ][ 'url' ] ) ) ) {
				$titles[] = sprintf(
					'<li class="videos__title title"><a class="%1$s" href="#video-item-%2$s"><span>%3$s</span></a></li>',
					( 0 == $i ) ? 'active' : 'inactive',
					$i,
					$videos[ $i ][ 'label' ]
				);
				$items[] = sprintf(
					'<a class="fancybox videos__item item %1$s" id="#video-item-%2$s" href="%3$s"><img class="lazy" src="#" data-src="%4$s" alt="%5$s"></a>',
					( 0 == $i ) ? 'active' : 'inactive',
					$i,
					$videos[ $i ][ 'url' ],
					$videos[ $i ][ 'thumbnail' ],
					esc_attr( $videos[ $i ][ 'label' ] )
				);
			}
		}
	}

	if ( ! empty( $titles ) && ! empty( $items ) ) {
		$content = '<ul class="list-unstyles list-inline text-center">' . implode( "\r\n", $titles ) . '</ul>' . implode( "\r\n", $items );
		include get_theme_file_path( 'views/home/section.php' );
	}


}