<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( have_posts() ) {

  while ( have_posts() ) {

	the_post();

	if ( is_page() ) {
		$title = get_the_title( get_the_ID() );
		$bgi = '';
		$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : __return_empty_string();
		$permalink = __return_empty_string();
		$label = __return_empty_string();
		$page_menu = get_page_nav_menu( get_the_ID() );
		$nav_menu = get_warning_nav_menu();
		include get_theme_file_path( 'views/jumbotron.php' );
	} else {
		the_pageheader();
	}

		?>

			<div class="container">

				<div class="content">

					<?php

						the_content();
						the_pager();

					?>

				</div>

			</div>

		<?php
	
		if ( comments_open( get_the_ID() ) ) comments_template();

	}

}
