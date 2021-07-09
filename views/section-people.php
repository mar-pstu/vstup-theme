<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section people" id="people">
	<div class="bgi lazy" data-src="<?php echo get_theme_file_uri( 'images/people/bgi.jpg' ); ?>"></div>
	<div class="container">
		<div class="row row-reverce middle-xs">
			<div class="col-xs-11 col-sm-9 col-md col-lg col-md-offset-1">

				<div class="wrap">

					<?php if ( ! empty( $title ) ) : ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>

					<?php if ( ! empty( $description ) ) : ?>
						<div class="description"><?php echo $description; ?></div>
					<?php endif; ?>

					<?php if ( ! empty( $permalink ) ) : ?>
						<p>
							<a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
						</p>
					<?php endif; ?>

				</div>

			</div>

			<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
				<div class="col-xs-11 col-sm-9 col-md-5 col-lg-4 first-md">
					<div class="slider">
						<div id="graduate-list">
							<?php echo $content; ?>
						</div>
						<div class="slider-controls" id="graduate-controls">
							<button class="slider-arrow prev" id="graduate-arrow-prev"><span class="sr-only"><?php _e( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ); ?></span></button>
							<button class="slider-arrow next" id="graduate-arrow-next"><span class="sr-only"><?php _e( 'Следующий слайд', VSTUP_TEXTDOMAIN ); ?></span></button>
						</div>
					</div>
				</div>
			<?php endif; ?>
			

		</div>
	</div>
</section>