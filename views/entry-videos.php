<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] && array_key_exists( 'permalink', $entry ) && is_url( $entry[ 'permalink' ] ) && array_key_exists( 'title', $entry ) ) : ?>
	<div class="entry" id="v01">

		<h3 class="hide"><?php echo $entry[ 'title' ]; ?></h3>
		
		<div class="row middle-xs center-xs">

			<?php if ( array_key_exists( 'description', $entry ) && ! empty( trim( $entry[ 'description' ] ) ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="description">
						<?php echo $entry[ 'description' ]; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 first-md">
				<a class="permalink fancybox" href="<?php echo $entry[ 'permalink' ]; ?>">
					<?php
						$thumbnail_attr = get_theme_file_uri( 'images/preview.jpg' );
						$thumbnail_alt = $entry[ 'title' ];
						if ( array_key_exists( 'thumbnail', $entry ) && is_array( $entry[ 'thumbnail' ] ) && array_key_exists( 'id', $entry[ 'thumbnail' ] ) && absint( $entry[ 'thumbnail' ][ 'id' ] ) ) {
							$thumbnail_src = wp_get_attachment_image_url( $entry[ 'thumbnail' ][ 'id' ], 'full', false );
							if ( $thumbnail_src && is_url( $thumbnail_src ) ) {
								$thumbnail_attr = sprintf( is_customize_preview() ? 'src="%1$s"' : 'src="#" data-lazy="%1$s"', esc_attr( $thumbnail_src ) );
								$thumbnail_alt = get_post_meta( $entry[ 'thumbnail' ][ 'id' ], '_wp_attachment_image_alt', true );
							}
						}
					?>
					<img <?php echo $thumbnail_attr; ?> alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
				</a>
				<p class="small mt-0 font-italic text-center"><?php echo $entry[ 'title' ]; ?></p>
			</div>

		</div>
	</div>
<?php endif; ?>