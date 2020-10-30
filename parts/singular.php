<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( have_posts() ) {

  while ( have_posts() ) {

		the_post();

		include get_theme_file_path( 'views/content-before.php' );

		the_content();

		include get_theme_file_path( 'views/content-after.php' );

		if ( comments_open( get_the_ID() ) ) comments_template();

	}

} else {

	include get_theme_file_path( 'views/no-posts.php' );

}


include get_theme_file_path( 'views/container-after.php' );