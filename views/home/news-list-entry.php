<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && array_key_exists( 'thumbnail', $entry ) ) : ?>

	<a class="news__thumbnail thumbnail" href="<?php echo esc_attr( array_key_exists( 'link', $entry ) ? $entry[ 'link' ] : '#' ); ?>" role="listitem">
		
		<img
			class="wp-post-thumbnail"
			src="#"
			data-lazy="<?php echo $entry[ 'thumbnail' ]; ?>"
			alt="<?php echo esc_attr( ( array_key_exists( 'title', $entry ) ) ? $entry[ 'title' ] : __( 'Заголовок', VSTUP_TEXTDOMAIN ) ); ?>"
		/>
		
		<?php if ( array_key_exists( 'title', $entry ) ) : ?>
			<h3><?php echo $entry[ 'title' ]; ?></h3>
		<?php endif; ?>

	</a>

<?php endif; ?>