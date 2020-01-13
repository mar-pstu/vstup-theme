<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };




class MetaboxPromo {


	function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register' ), 10, 0 );
		add_action( 'save_post', array( $this, 'save_postdata' ), 10, 1 );
	}


	function register(){
		$slug = VSTUP_SLUG;
		add_meta_box(
			"{$slug}_promo",
			__( 'Первый экран страницы', VSTUP_TEXTDOMAIN ),
			array( $this, 'render' ),
			array( 'page' ),
			'side'
		);
	}


	function render( $post, $meta ) {
		$slug = VSTUP_SLUG;
		$nav_menus = wp_get_nav_menus();
		$current_nav_menu = get_post_meta( $post->ID, "{$slug}_page_nav_menu", true );
		wp_nonce_field( "{$slug}_promo", "{$slug}_nonce" );
		include VSTUP_DIR . 'views/metaboxes/promo.php';
	}



	function save_postdata( $post_id ) {
		$slug = VSTUP_SLUG;
		if ( ! isset( $_POST[ "{$slug}_nonce" ] ) ) return;
		if ( ! wp_verify_nonce( $_POST[ "{$slug}_nonce" ], "{$slug}_promo" ) ) return;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if( ! current_user_can( 'edit_post', $post_id ) ) return;
		if ( isset( $_REQUEST[ 'page_nav_menu' ] ) ) {
			update_post_meta( $post_id, "{$slug}_page_nav_menu", sanitize_key( $_REQUEST[ 'page_nav_menu' ] ) );
		} else {
			delete_post_meta( $post_id, "{$slug}_page_nav_menu" );
		}
	}



}