<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] && array_key_exists( 'permalink', $entry ) ) : ?>
	<?php
		$thumbnail_attr = '';
		if ( array_key_exists( 'thumbnail', $entry ) && is_array( $entry[ 'thumbnail' ] ) && array_key_exists( 'id', $entry[ 'thumbnail' ] ) && absint( $entry[ 'thumbnail' ][ 'id' ] ) ) {
			$thumbnail_src = wp_get_attachment_image_url( $entry[ 'thumbnail' ][ 'id' ], 'medium', false );
			if ( $thumbnail_src && is_url( $thumbnail_src ) ) {
				$thumbnail_attr = sprintf( is_customize_preview() ? 'data-src="%1$s"' : 'style="background-image: url(%1$s);"', esc_attr( $thumbnail_src ) );
			}
		}
	?>
	<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
		<a
			class="flatitem lazy"
			href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>"
			<?php echo $thumbnail_attr; ?>
		>
			<?php if ( array_key_exists( 'title', $entry ) ) : ?>
				<div class="title"><?php echo $entry[ 'title' ]; ?></div>
			<?php endif; ?>
		</a>
	</div>
<?php endif; ?>