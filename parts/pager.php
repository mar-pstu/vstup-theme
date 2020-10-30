<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


include get_theme_file_path( 'views/pager-before.php' );


foreach ( [
	'previous'  => [
		'entry'     => get_previous_post(),
		'label'     => __( 'Смотреть предыдущий пост', VSTUP_TEXTDOMAIN ),
	],
	'next'      => [
		'entry'     => get_next_post(),
		'label'     => __( 'Смотреть следующий пост', VSTUP_TEXTDOMAIN ),
	],
] as $key => $value ) {
	extract( $value );
	if ( $entry && ! is_wp_error( $entry ) ) {
		$post = $entry;
		setup_postdata( $post );
		include get_theme_file_path( 'views/adjacent-post.php' );
	}
}

wp_reset_postdata();


include get_theme_file_path( 'views/pager-after.php' );