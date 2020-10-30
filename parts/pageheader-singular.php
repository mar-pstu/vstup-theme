<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = single_post_title( '', false );
$description = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;


include get_theme_file_path( 'views/pageheader.php' );