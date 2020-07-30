<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

  while ( have_posts() ) {

	the_post();

	if ( is_page() ) {
		get_template_part( 'parts/jumbotron' );
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

				<?php if ( comments_open( get_the_ID() ) ) comments_template(); ?>

			</div>

		<?php

	}

}
