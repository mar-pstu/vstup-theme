<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) ) : ?>
	<section class="faculties__item item">
		<div class="container">
			<div class="row middle-xs">
				
				<?php if ( array_key_exists( 'permalink', $entry ) && array_key_exists( 'logo', $entry ) && array_key_exists( 'name', $entry ) ) : ?>
					<?php
						if ( ! empty( $entry[ 'logo' ] ) ) {
							$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $entry[ 'logo' ] ) );
							if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
								$entry[ 'logo' ] = wp_get_attachment_image_url( $thumbnail_id, 'medium', false );
							}
						}
					?>
					<div class="col-xs-12 col-sm-4">
						<a class="logo" href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>">
							<img src="#" data-lazy="<?php echo esc_attr( $entry[ 'logo' ] ); ?>" alt="<?php echo esc_attr( $entry[ 'name' ] ); ?>" />
						</a>
					</div>
				<?php endif; ?>

				<div class="col-xs-12 col-sm">

					<?php if ( array_key_exists( 'name', $entry ) ) : ?>
						<h3 class="title"><?php echo $entry[ 'name' ] ?></h3>
					<?php endif; ?>

					<?php if ( array_key_exists( 'excerpt', $entry ) ) : ?>
						<div class="excerpt"><?php echo $entry[ 'excerpt' ]; ?></div>
					<?php endif; ?>					

					<?php if ( array_key_exists( 'permalink', $entry ) ) : ?>
						<a class="permalink" href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>"><?php _e( 'Докладніше', VSTUP_TEXTDOMAIN ); ?></a>
					<?php endif; ?>

				</div>

			</div>
		</div>
	</section>
<?php endif; ?>