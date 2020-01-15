<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


the_pageheader();


?>


<div class="container">

	<?php

		$sector = get_queried_object();

		$specialties = get_terms( array(
			'taxonomy'   => 'specialties',
			'hide_empty' => true,
			'parent'     => $sector->term_id,
		) );

		if ( is_array( $specialties ) && ! empty( $specialties ) ) {

			foreach ( $specialties as $specialty ) {

				$educational_programs = get_posts( array(
					'numberposts' => -1,
					'orderby'     => 'name',
					'order'       => 'DESC',
					'post_type'   => 'educational_program',
					'specialties' => $specialty->term_id
				) );

				if ( is_array( $educational_programs ) && ! empty( $educational_programs ) ) {

					?>

						<h2><?php echo apply_filters( 'single_term_title', $specialty->name ); ?></h2>

						<div class="row stretch-xs">

					<?php

					foreach ( $educational_programs as $educational_program ) {
						setup_postdata( $educational_program );
						$title = apply_filters( 'the_title', $educational_program->post_title, $educational_program->ID );
						$permalink = get_permalink( $educational_program->ID );
						$thumbnail = get_the_post_thumbnail_url( $educational_program->ID, 'medium' );
						include get_theme_file_path( 'views/flatitem.php' );
					}

					?>

						</div>

					<?php

				}

			}

		}

		// pager для секторов

	?>

</div>