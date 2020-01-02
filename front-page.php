<?php


namespace vstup;


get_header();


foreach ( array(
    'firstscreen',
    'about',
    'news',
    'action',
    'specialties',
    'videos',
    'people',
    'services',
    'questions',
) as $key ) {
    if ( get_theme_mod( VSTUP_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}



get_footer();