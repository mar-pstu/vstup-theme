<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



/**
 * Перевод сблоков
 * */
foreach ( array(
    'about_title',
    'about_label',
    'about_description',
    "news_title",
    "action_title",
    'action_description',
    'action_video',
    'people_title',
    'people_description',
    'people_label',
    'services_title',
    'services_label',
    'questions_title',
    'questions_form',
) as $key ) {
    $value = wp_strip_all_tags( get_theme_mod( VSTUP_SLUG . '_' . $key, '' ) );
    if ( ! empty( $value ) ) {
        pll_register_string( $key, $value, VSTUP_TEXTDOMAIN, false );
    }
}