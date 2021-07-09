<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] && array_key_exists( 'title', $entry ) ) : ?>
	<div class="graduate">

		<h3 class="title">
			<?php echo $entry[ 'title' ]; ?>
		</h3>
		
		<?php
			$foto_attr = '';
			$foto_alt = '';
			if ( array_key_exists( 'foto', $entry ) && is_array( $entry[ 'foto' ] ) && array_key_exists( 'id', $entry[ 'foto' ] ) && absint( $entry[ 'foto' ][ 'id' ] ) ) {
				$logo_src = wp_get_attachment_image_url( $entry[ 'foto' ][ 'id' ], 'medium', false );
				if ( $logo_src && is_url( $logo_src ) ) {
					$foto_attr = sprintf( is_customize_preview() ? 'src="%1$s"' : 'src="#" data-lazy="%1$s"', esc_attr( $logo_src ) );
					$foto_alt = get_post_meta( $entry[ 'foto' ][ 'id' ], '_wp_attachment_image_alt', true );
				}
			}
		?>
		<?php if ( ! empty( $foto_attr ) ) : ?>
			<div class="foto">
				<img class="wp-post-tumbnail" <?php echo $foto_attr; ?> alt="<?php echo esc_attr( $foto_alt ); ?>">
			</div>
		<?php endif; ?>
		
		<?php
			$logo_attr = '';
			$logo_alt = '';
			if ( array_key_exists( 'logo', $entry ) && is_array( $entry[ 'logo' ] ) && array_key_exists( 'id', $entry[ 'logo' ] ) && absint( $entry[ 'logo' ][ 'id' ] ) ) {
				$logo_src = wp_get_attachment_image_url( $entry[ 'logo' ][ 'id' ], 'thumbnail', false );
				if ( $logo_src && is_url( $logo_src ) ) {
					$logo_attr = sprintf( is_customize_preview() ? 'src="%1$s"' : 'src="#" data-lazy="%1$s"', esc_attr( $logo_src ) );
					$logo_alt = get_post_meta( $entry[ 'foto' ][ 'id' ], '_wp_attachment_image_alt', true );
				}
			}
		?>
		<?php if ( ! empty( $logo_attr ) ) : ?>
			<a class="sector" href="<?php echo array_key_exists( 'permalink', $entry ) && is_url( $entry[ 'permalink' ] ) ? esc_attr( $entry[ 'permalink' ] ) : ''; ?>">
				<img <?php echo $logo_attr; ?> alt="<?php echo esc_attr( $logo_alt ); ?>">
			</a>
		<?php endif; ?>
		
		<?php if ( array_key_exists( 'specialty', $entry ) && ! empty( $entry[ 'specialty' ] ) ) : ?>
			<a class="specialty" href="<?php echo array_key_exists( 'permalink', $entry ) && is_url( $entry[ 'permalink' ] ) ? esc_attr( $entry[ 'permalink' ] ) : ''; ?>">
				<?php echo $entry[ 'specialty' ]; ?>
			</a>
		<?php endif; ?>
		
		<?php if ( array_key_exists( 'excerpt', $entry ) && ! empty( $entry[ 'excerpt' ] ) ) : ?>
			<div class="excerpt">
				<?php echo $entry[ 'excerpt' ]; ?>
			</div>
		<?php endif; ?>

	</div>
<?php endif; ?>