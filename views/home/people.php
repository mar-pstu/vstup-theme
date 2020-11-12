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
			<?php if ( ! empty( $graduate_list = do_shortcode( '[graduate_list]', false ) ) ) : ?>
				<div class="col-xs-11 col-sm-9 col-md-5 col-lg-4 first-md">
					<?php echo $graduate_list; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>