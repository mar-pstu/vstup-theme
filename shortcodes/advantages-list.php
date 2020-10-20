<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Выводит html-код списка преимуществ
 */
function the_advantages_list( $args = [] ) {
	echo get_advantages_list( $args );
}


/**
 * Выводит список преимуществ организации
 * @param    array   $args   параметры вывода
 */
function get_advantages_list( $args = [] ) {
	$html = '';
	$advantages = get_theme_mod( 'advantages', [] );
	if ( $advantages ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( 'advantages_number', 3 ); $i++ ) {
			if ( isset( $advantages[ $i ] ) && is_array( $advantages[ $i ] ) ) {
				$advantages[ $i ] = array_merge( [
					'label' => '',
					'value' => '',
					'image' => '',
					'link'  => '',
				], $advantages[ $i ] );
				if ( ! empty( $advantages[ $i ][ 'image' ] ) ) {
					$advantages[ $i ][ 'image' ] = wp_get_attachment_image_url( attachment_url_to_postid( $advantages[ $i ][ 'image' ] ), 'medium', false );
				}
				extract( $advantages[ $i ] );
				include get_theme_file_path( 'views/advantage-item.php' );
			}
		}
		$html = ob_get_contents();
		ob_end_clean();
	}
	return ( empty( $html ) ) ? '' : '<div class="row stretch-xs" role="list">' . $html . '</div>';
}
