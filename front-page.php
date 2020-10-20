<?php


namespace vstup;


get_header();


foreach ( array(
    'firstscreen',  // ok
    'about',        // ok
    'news',         // ok
    'action',       // ok
    'specialties',
    'videos',       // ok
    'people',       
    'services',     // ok
    'questions',    // ok
) as $key ) {
    if ( get_theme_mod( "{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}



get_footer();