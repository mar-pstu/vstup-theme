<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_the_title( get_the_ID() );
$bgi = ( has_post_thumbnail( get_the_ID() ) ) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : '';
$permalink = '';
$label = '';
$page_menu = '';
$thumbnail_url = '';


// пункты меню страницы
$page_menu_items = [];


// получаем список подстраниц
if ( get_post_meta( $post->ID, VSTUP_SLUG . '_subpage_menu', true ) ) {
	$pages = get_pages( array(
		'sort_order'   => 'ASC',
		'sort_column'  => 'post_title',
		'hierarchical' => 0,
		'parent'       => get_the_ID(),
		'offset'       => 0,
		'post_type'    => 'page',
		'post_status'  => 'publish',
	) );
	if ( is_array( $pages ) && ! empty( $pages ) ) {
		foreach ( $pages as $page ) {
			$page_menu_items[] = array(
				'title'        => apply_filters( 'the_title', $page->post_title, $page->ID ),
				'description'  => $page->post_excerpt,
				'url'          => get_permalink( $page->ID ),
			);
		}
	}
}


// получаем пункты прикреплённого меню
$promo_nav_menu = get_post_meta( $post->ID, VSTUP_SLUG . '_page_nav_menu', true );
if ( ! empty( $promo_nav_menu ) ) {
	$promo_items = wp_get_nav_menu_items( $promo_nav_menu );
	if ( is_array( $promo_items ) && ! empty( $promo_items ) ) {
		$promo_items = wp_list_filter( $promo_items, array( 'menu_item_parent' => 0 ), 'AND' );
		foreach ( $promo_items as $item ) {
			$page_menu_items[] = array(
				'title'        => $item->title,
				'description'  => $item->description,
				'url'          => $item->url,
			);
		}
	}
}


// формируем меню
if ( ! empty( $page_menu_items ) ) {
	$page_menu_items = wp_list_sort( $page_menu_items, array( 'title' => 'ASC' ) );
	$page_menu .= '<ul class="menu">';
	foreach ( $page_menu_items as $item ) {
		$page_menu .= sprintf(
			'<li><a href="%1$s" title="%2$s">%3$s</a></li>',
			$item[ 'url' ],
			esc_attr( $item[ 'description' ] ),
			$item[ 'title' ]
		);
	}
	$page_menu .= '</ul>';
	include get_theme_file_path( 'views/container-after.php' );
	include get_theme_file_path( 'views/jumbotron.php' );
	include get_theme_file_path( 'views/container-before.php' );
	
} else {
	include get_theme_file_path( 'views/pageheader.php' );
}