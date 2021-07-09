<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : ?>

	<div class="partners__item item">

		<?php if ( array_key_exists( 'logo', $entry ) && is_array( $entry[ 'logo' ] ) && array_key_exists( 'id', $entry[ 'logo' ] ) ) :  ?>
			<img
				src="#"
				data-lazy="<?php echo wp_get_attachment_image_url( $entry[ 'logo' ][ 'id' ], 'medium', false ); ?>"
				alt="<?php echo get_post_meta( $entry[ 'logo' ][ 'id' ], '_wp_attachment_image_alt', true ); ?>"
			/>
		<?php endif; ?>

	</div>

<?php endif; ?>