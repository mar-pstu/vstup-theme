<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


the_pageheader();

$sector = get_queried_object();

$educational_programs = get_posts( array(
	'numberposts' => -1,
	'orderby'     => 'name',
	'order'       => 'DESC',
	'post_type'   => 'educational_program',
	'specialties' => $specialty->term_id
) );

?>


<div class="container">

	<h2><?php _e( 'Образовательные программы', VSTUP_TEXTDOMAIN ); ?></h2>

	<div class="row stretch-xs">

		<?php

		if ( have_posts() ) {

			while ( have_posts() ) {
				
				the_post();
				$title = get_the_title( get_the_ID() );
				$permalink = get_the_permalink( get_the_ID() );
				$thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
				include get_theme_file_path( 'views/flatitem.php' );

			}

		}

		?>

	</div>

	<!-- калькулятор/фильтр -->
	
</div>
