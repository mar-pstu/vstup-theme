<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section questions" id="questions">
	<div class="bg lazy" data-src="<?php echo esc_attr( $bgi ); ?>"></div>
	<div class="container">
		<div class="row middle-xs center-xs">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
					<h2 class="title"><?php echo $title; ?></h2>
					<?php get_template_part( 'parts/lists/contacts' ); ?>
					<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
						<p class="permalink-wrap">
							<a class="btn btn-success permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $form ) ) : ?>
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 col-md-offset-1">
					<?php echo do_shortcode( $form, false ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>