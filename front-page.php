<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


foreach ( apply_filters( 'get_home_parts', [] ) as $key ) {
    if ( $key && get_theme_mod( "{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}


get_footer();