<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( have_posts() ) {

	while ( have_posts() ) {
		the_post();
		the_pageheader();
		?>
			<div class="content">
				<div class="tabs tabs--primary" data-heading="h2">
					<h2><?php _e( 'Конкурсные предложения', VSTUP_TEXTDOMAIN ); ?></h2>
					<div class="accordio accordio--primary" data-heading="h4">
						<!-- вывод конкурсных предложений -->
					</div>
					<h2><?php _e( 'Дополнительная информация', VSTUP_TEXTDOMAIN ); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
		<?php
		the_pager();
		if ( comments_open( get_the_ID() ) ) comments_template();
	}

}