<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$partners = get_theme_mod( VSTUP_SLUG . '_partners', array() );
$slides = __return_empty_array();


if ( is_array( $partners ) && ! empty( $partners ) ) {

	for ( $i = 0; $i < get_theme_mod( VSTUP_SLUG . '_partners_number', 5 ); $i++ ) { 
		
		if ( ! empty( $partners[ $i ] ) ) {

			$slides[] = '<div class="partners__item item">' . get_attachment_image(
				attachment_url_to_postid( $partners[ $i ] ),
				array(
					'size'       => 'medium',
					'attribute'  => 'lazy',
					'class_name' => '',
					'alt'        => '',
				)
			) . '</div>';

		}

	}

	if ( ! empty( $slides ) ) {
		include get_theme_file_path( 'views/partners.php' );
	}

}