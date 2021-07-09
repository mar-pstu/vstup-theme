<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>



<?php if ( isset( $entry ) && is_array( $entry ) && array_key_exists( 'permalink', $entry ) && array_key_exists( 'logo', $entry ) && array_key_exists( 'title', $entry ) ) : ?>
	<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
		<a class="faculties__item item" href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>">
			<div class="side side--front">
				<?php
					$logo_attr = '';
					$logo_alt = $entry[ 'title' ];
					if ( array_key_exists( 'logo', $entry ) && is_array( $entry[ 'logo' ] ) && array_key_exists( 'id', $entry[ 'logo' ] ) && absint( $entry[ 'logo' ][ 'id' ] ) ) {
						$logo_src = wp_get_attachment_image_url( $entry[ 'logo' ][ 'id' ], 'medium', false );
						if ( $logo_src && is_url( $logo_src ) ) {
							$logo_attr = sprintf( is_customize_preview() ? 'src="#" data-src="%1$s"' : 'src="%1$s"', esc_attr( $logo_src ) );
							$logo_alt = get_post_meta( $entry[ 'logo' ][ 'id' ], '_wp_attachment_image_alt', true );
						}
					}
				?>
				<img class="logo lazy" <?php echo $logo_attr; ?> alt="<?php echo esc_attr( $logo_alt ); ?>" />
			</div>
			<div class="side side--back">
				<h3 class="title"><?php echo $entry[ 'title' ] ?></h3>
				<?php if ( array_key_exists( 'excerpt', $entry ) ) : ?>
					<div class="excerpt"><?php echo $entry[ 'excerpt' ]; ?></div>
				<?php endif; ?>	
			</div>
		</a>
	</div>
<?php endif; ?>