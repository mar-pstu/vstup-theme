<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$items = get_theme_mod( 'firstscreen', [] );
$slides = [];


if ( ! empty( $items ) ) {

	ob_start();

	for ( $i = 0; $i < get_theme_mod( 'firstscreen_number' ); $i++ ) {
		
		ob_clean();

		$title = ( isset( $items[ $i ][ 'title' ] ) ) ? $items[ $i ][ 'title' ] : '';
		$bgi = '';
		$thumbnail_url = ( isset( $items[ $i ][ 'bgi' ] ) ) ? $items[ $i ][ 'bgi' ] : '';
		$excerpt = ( isset( $items[ $i ][ 'excerpt' ] ) ) ? $items[ $i ][ 'excerpt' ] : '';
		$permalink = ( isset( $items[ $i ][ 'permalink' ] ) ) ? $items[ $i ][ 'permalink' ] : '';
		$label = ( isset( $items[ $i ][ 'label' ] ) ) ? $items[ $i ][ 'label' ] : __( 'Подробней', VSTUP_TEXTDOMAIN );
		$page_menu = '';

		include get_theme_file_path( 'views/jumbotron.php' );

		$slides[] = '<div>' . ob_get_contents() . '</div>';

	}

	ob_end_clean();

	if ( ! empty( $slides ) ) {

		if ( file_exists( $init_script_path = get_theme_file_path( 'scripts/init/firstscreen-list.js' ) ) ) {
			wp_enqueue_style( 'slick' );
			wp_enqueue_scripts( 'slick' );
			wp_add_inline_script( 'slick', file_get_contents( $init_script_path ), 'after' );
		}

		include get_theme_file_path( 'views/home/firstscreen.php' );

	}

}