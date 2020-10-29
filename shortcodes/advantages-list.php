<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Выводит список преимуществ организации
 * @param    array   $args   параметры вывода
 */
function get_advantages_list() {
	$html = '';
	ob_start();
	$advantages = get_theme_mod( 'advantages' );
	$number = get_theme_mod( 'advantages_number' );
	if ( $advantages ) {
		
		include get_theme_file_path( 'views/advantage-list-before.php' );
		for ( $i = 0; $i < $number; $i++ ) {
			if ( isset( $advantages[ $i ] ) && is_array( $advantages[ $i ] ) ) {
				include get_theme_file_path( 'views/advantage-item-before.php' );
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
				include get_theme_file_path( 'views/advantage-item-after.php' );
			}
		}
		include get_theme_file_path( 'views/advantage-list-after.php' );
	}
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}


add_shortcode( 'advantages_list', 'vstup\get_graduate_slider' );