<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>


<section class="section services" id="services">
	<div class="container">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2><?php echo $title; ?></h2>
		<?php endif; ?>
		
		<?php echo $content; ?>		
		
		<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) ) : ?>
			<p class="text-center">
				<a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
			</p>
		<?php endif; ?>

	</div>
</section>