<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>


<section class="section <?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>">
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
		<?php echo  $content; ?>		
		<?php if ( ! empty( $permalink ) ) : ?>
			<p class="text-center">
				<a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
			</p>
		<?php endif; ?>
	</div>
</section>