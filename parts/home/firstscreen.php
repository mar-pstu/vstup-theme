<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$items = get_theme_mod( VSTUP_SLUG . '_firstscreen', __return_empty_array() );
$slides = __return_empty_array();


if ( ! empty( $items ) ) {

	ob_start();

	for ( $i = 0; $i < get_theme_mod( VSTUP_SLUG . '_firstscreen_number', 5 ); $i++ ) {
		
		ob_clean();

		$title = ( isset( $items[ $i ][ 'title' ] ) ) ? $items[ $i ][ 'title' ] : __return_empty_string();
		$bgi = ( isset( $items[ $i ][ 'bgi' ] ) ) ? $items[ $i ][ 'bgi' ] : __return_empty_string();
		$excerpt = ( isset( $items[ $i ][ 'excerpt' ] ) ) ? $items[ $i ][ 'excerpt' ] : __return_empty_string();
		$permalink = ( isset( $items[ $i ][ 'permalink' ] ) ) ? $items[ $i ][ 'permalink' ] : __return_empty_string();
		$label = ( isset( $items[ $i ][ 'label' ] ) ) ? $items[ $i ][ 'label' ] : __( 'Подробней', VSTUP_TEXTDOMAIN );
		$nav_menu = __return_empty_string();
		$page_menu = __return_empty_string();

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$excerpt = pll__( $excerpt );
			$permalink = pll__( $permalink );
			$label = pll__( $label );
		}

		include get_theme_file_path( 'views/jumbotron.php' );

		$slides[] = '<div>' . ob_get_contents() . '</div>';

	}

	ob_end_clean();


	if ( ! empty( $slides ) ) {
		include get_theme_file_path( 'views/home/firstscreen.php' );
		if ( count( $slides ) > 1 ) {
			wp_enqueue_style( 'slick' );
			wp_enqueue_script( 'slick' );
			wp_add_inline_script( 'slick', \file_get_contents( VSTUP_DIR . 'scripts/firstscreen-init.js' ), 'after' );
		}
	}

}