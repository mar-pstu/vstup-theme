<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'action_title' );
$excerpt = get_theme_mod( 'action_excerpt' );
$label = get_theme_mod( 'action_label' );
$bgi = get_theme_mod( 'action_bgi' );
$thumbnail = get_theme_mod( 'action_thumbnail' );
$video = get_theme_mod( 'action_video' );
$page_id = get_theme_mod( 'action_page_id' );
$permalink = ( empty( $page_id ) ) ? '' : get_permalink( $page_id );


include get_theme_file_path( 'views/home/action.php' );