<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



get_header();



if ( is_singular() ) {
	if ( 'educational_program' == get_post_type( get_the_ID() ) ) {
		get_template_part( 'parts/singular/educational', 'program' );
	} else {
		get_template_part( 'parts/singular' );
	}
} elseif ( is_search() ) {
	get_template_part( 'parts/search' );
} else {
	if ( is_tax( 'specialties' ) ) {
		$term = get_queried_object();
		if ( 0 == $term->parent ) {
			get_template_part( 'parts/archive', 'sector' );
		} else {
			get_template_part( 'parts/archive', 'specialty' );
		}
	} elseif ( is_post_type_archive( 'educational_program' ) ) {
		get_template_part( 'parts/archive/educational', 'program' );
	} else {
		get_template_part( 'parts/archive' );
	}
}



get_footer();