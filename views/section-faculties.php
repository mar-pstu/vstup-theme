<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section faculties" id="faculties">
	
	<div class="container text-center">

			<?php if ( isset( $title ) && ! empty( trim( $title ) ) ) : ?>
				<h2><?php echo $title; ?></h2>
			<?php endif; ?>

			<?php if ( isset( $excerpt ) && ! empty( trim( $excerpt ) ) ) : ?>
				<p><?php echo $excerpt; ?></p>
			<?php endif; ?>

	</div>

	<?php if ( isset( $content ) ) : ?>
		<div class="container">
			<div class="row">
				<?php echo $content; ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
		<div class="container">
			<p class="text-center"><a class="btn btn-primary" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p>
		</div>
	<?php endif; ?>

</section>