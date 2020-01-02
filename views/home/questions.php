<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section questions lazy" id="questions" data-src="<?php echo esc_attr( $bgi ); ?>">
	<div class="container">
		<div class="row middle-xs center-xs">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
					<h2 class="title"><?php echo $title; ?></h2>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $form ) ) : ?>
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 col-md-offset-1">
					<?php echo $form; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>