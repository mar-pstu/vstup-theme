<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$partners = get_theme_mod( 'partners' );
$number = get_theme_mod( 'partners_number' );

if ( is_array( $partners ) && ! empty( $partners ) && $number > 0 ) {

	if ( file_exists( $init_script_path = get_theme_file_path( 'scripts/init/partners-list.js' ) ) ) {
		wp_enqueue_style( 'slick' );
		wp_enqueue_scripts( 'slick' );
		wp_add_inline_script( 'slick', file_get_contents( $init_script_path ), 'after' );
	}

	include get_theme_file_path( 'views/partners-before.php' );

	for ( $i = 0; $i < get_theme_mod( 'partners_number' ); $i++ ) { 
		
		if ( ! empty( $partners[ $i ] ) ) {

			include get_theme_file_path( 'views/partners-item-before.php' );

			echo get_attachment_image(
				attachment_url_to_postid( $partners[ $i ] ),
				[
					'size'       => 'medium',
					'attribute'  => 'lazy',
					'class_name' => '',
					'alt'        => '',
				]
			);

			include get_theme_file_path( 'views/partners-item-after.php' );

		}

	}

	include get_theme_file_path( 'views/partners-after.php' );

}