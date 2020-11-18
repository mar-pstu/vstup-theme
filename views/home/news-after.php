<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


		</div>
	</div>

	<?php if ( isset( $news_permalink ) && ! empty( $news_permalink ) && isset( $news_label ) && ! empty( $news_label ) ) : ?>
		<div class="container">
			<p class="text-center"><a class="btn btn-primary" href="<?php echo esc_attr( $news_permalink ); ?>"><?php echo $news_label; ?></a></p>
		</div>
	<?php endif; ?>

</div>