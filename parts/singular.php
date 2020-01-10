<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {
		the_post();
		the_pageheader();
		echo '<div class="content">'; the_content(); echo '</div>';
		the_pager();
		if ( comments_open( get_the_ID() ) ) comments_template();
	}

}