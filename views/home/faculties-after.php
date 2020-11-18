<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


		</div>
	</div>

	<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
		<div class="container">
			<p class="text-center"><a class="btn btn-primary" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p>
		</div>
	<?php endif; ?>

</section>