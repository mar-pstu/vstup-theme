<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



get_header();



if ( is_singular() ) {
	if ( 'educational_program' == get_post_type( get_the_ID() ) ) {
		get_template_part( 'parts/educational', 'program' );
	} else {
		get_template_part( 'parts/singular' );
	}
} elseif ( is_search() ) {
	get_template_part( 'parts/search' );
} else {
	get_template_part( 'parts/archive' );
}



get_footer();