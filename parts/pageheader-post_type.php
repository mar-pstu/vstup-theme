<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = post_type_archive_title( '', false );
$description = do_shortcode( get_the_post_type_description() );


include get_theme_file_path( 'views/pageheader.php' );