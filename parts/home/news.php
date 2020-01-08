<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$category_id = get_translate_id( get_theme_mod( VSTUP_SLUG . '_news_category_id', __return_empty_string() ), 'category' );


if ( ! empty( $category_id ) ) {

	$heading = get_theme_mod( VSTUP_SLUG . '_news_heading', __( 'Новости', VSTUP_TEXTDOMAIN ) );

	if ( function_exists( 'pll__' ) ) {
		$heading = pll__( $heading );
	}

	if ( empty( $heading ) ) {
		$heading = get_term_field( 'name', $category_id, 'category', 'raw' );
	}

	$entries = __return_empty_array();
	$sticky_entries = __return_empty_array();

	$sticky_ids = get_option( 'sticky_posts' );
	$sticky_ids = ( is_array( $sticky_ids ) ) ? array_slice( $sticky_ids, 0, 3 ) : __return_empty_array();

	$sticky_entries = get_posts( array(
		'numberposts' => 3,
		'category'    => 0,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => $sticky_ids,
		'exclude'     => array(),
		'post_type'   => 'post',
		'suppress_filters' => true,
	) );

	$unsticky_entries = get_posts( array(
		'numberposts' => ( ( int ) get_theme_mod( VSTUP_SLUG . '_news_numberposts', 3 ) + ( 3 - count( $sticky_ids ) ) ),
		'category'    => $category_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => array(),
		'exclude'     => $sticky_ids,
		'post_type'   => 'post',
		'suppress_filters' => true,
	) );

	if ( is_array( $sticky_entries ) ) {
		$entries = array_merge( $entries, $sticky_entries );
	}

	if ( is_array( $unsticky_entries ) ) {
		$entries = array_merge( $entries, $unsticky_entries );
	}

	if ( is_array( $entries ) && ! empty( $entries ) ) {

		$categories = __return_empty_string();

		if ( has_nav_menu( 'home_news' ) ) {
			$categories = wp_nav_menu( array(
				'theme_location'  => 'home_news',
				'menu'            => 'home_news', 
				'container'       => false, 
				'container_class' => '', 
				'container_id'    => '',
				'menu_class'      => 'categories', 
				'menu_id'         => '',
				'echo'            => false,
				'depth'           => 1,
			) );
		}

		include get_theme_file_path( 'views/home/news.php' );

	}

}