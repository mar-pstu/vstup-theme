<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_the_archive_title();
$description = do_shortcode( get_the_archive_description() );


include get_theme_file_path( 'views/pageheader.php' );