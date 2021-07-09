<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрирует метабокс
 * */
function metabox_promo_register () {
	add_meta_box(
		VSTUP_SLUG . '_promo',
		__( 'Первый экран страницы', VSTUP_TEXTDOMAIN ),
		'vstup\metabox_promo_render',
		[ 'page' ],
		'side'
	);
}

add_action( 'add_meta_boxes', 'vstup\metabox_promo_register', 10, 0 );


/**
 * Формирует html-код метабокса
 * */
function metabox_promo_render( $post, $meta ) {
	wp_nonce_field( VSTUP_SLUG . '_promo', VSTUP_SLUG . '_nonce' );
	include VSTUP_DIR . 'views/admin/promo.php';
}


/**
 * Сохраняет данные метабокса
 * */
function metabox_promo_save_postdata( $post_id ) {
	if ( ! isset( $_POST[ VSTUP_SLUG . '_nonce' ] ) ) return;
	if ( ! wp_verify_nonce( $_POST[ VSTUP_SLUG . '_nonce' ], VSTUP_SLUG . '_promo' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_REQUEST[ 'subpage_menu' ] ) && 'on' == $_REQUEST[ 'subpage_menu' ] ) {
		update_post_meta( $post_id, VSTUP_SLUG . '_subpage_menu', true );
	} else {
		delete_post_meta( $post_id, VSTUP_SLUG . '_subpage_menu' );
	}
	if ( isset( $_REQUEST[ 'page_nav_menu' ] ) ) {
		update_post_meta( $post_id, VSTUP_SLUG . '_page_nav_menu', sanitize_key( $_REQUEST[ 'page_nav_menu' ] ) );
	} else {
		delete_post_meta( $post_id, VSTUP_SLUG . '_page_nav_menu' );
	}
}

add_action( 'save_post', 'vstup\metabox_promo_save_postdata', 10, 1 );