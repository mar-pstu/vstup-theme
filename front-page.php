<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


get_header();


if (
	true
	&& $page_on_front_id = get_option( 'page_on_front' )
	&& is_object( $page_on_front = get_page( $page_on_front_id, OBJECT, 'raw' ) )
	&& ! is_wp_error( $page_on_front )
) {

	// выводим страницу
	$post = $page_on_front;
	setup_postdata( $post );
	get_template_part( 'parts/singular' );
	wp_reset_postdata();

} else {

	// выводим секции главной
	$sections_keys = apply_filters( 'home_section_list', [ 'firstscreen', 'about', 'faculties', 'action', 'videos', 'people', 'services', 'questions' ] );

	if ( is_array( $sections_keys ) && ! empty( $sections_keys ) ) {

		foreach ( $sections_keys as $key ) {
			if ( get_theme_mod( $key . 'usedby' ) ) {
				get_template_part( 'parts/section', $key );
			}
		}

	} else {

		// выводим архив
		get_template_part( 'parts/archive' );

	}

}


get_footer();