<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Возвращает список услуг ниверситета,
 * используется на главной и в аналогичном шорткоде
 */
function get_services_list() {
	$result = '';
	ob_start();
	$services = get_theme_mod( 'services_items' );
	$items_number = get_theme_mod( 'services_items_number' );
	if ( is_array( $services ) && ! empty( $services ) && $items_number > 0 ) {
		include get_theme_file_path( 'views/flatitem-list-before.php' );
		for ( $i = 0;  $i < $items_number;  $i++ ) { 
			if ( isset( $services[ $i ] ) && is_array( $services[ $i ] ) ) {
				$service = array_merge( [
					'title'     => '',
					'permalink' => '#',
					'thumbnail' => '',
				], ( array ) $services[ $i ] );
				if ( ! empty( trim( $service[ 'title' ] ) ) ) {
					extract( $service );
					include get_theme_file_path( 'views/flatitem.php' );
				}
			}
		}
		include get_theme_file_path( 'views/flatitem-list-after.php' );
	}
	$result = ob_get_contents();
	ob_end_clean();
	return $result;
}

add_shortcode( 'services_list', 'vstup\get_services_list' );