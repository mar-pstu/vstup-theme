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
		$warning_menu = ( has_nav_menu( 'warning' ) ) ? wp_nav_menu( [
			'theme_location'  => 'warning',
			'menu'            => 'warning',
			'container'       => false,
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'warning list-inline small',
			'menu_id'         => '',
			'echo'            => false,
			'fallback_cb'     => '',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
			'depth'           => 1,
			'walker'          => '',
		] ) : '';
		$page_menu = '';

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
			wp_add_inline_script( 'slick', \file_get_contents( VSTUP_DIR . 'scripts/firstscreen-list-init.js' ), 'after' );
		}
	}

}