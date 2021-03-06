<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>



<?php if ( isset( $entry ) && is_array( $entry ) && array_key_exists( 'permalink', $entry ) && array_key_exists( 'logo', $entry ) && array_key_exists( 'name', $entry ) ) : ?>
	<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2">
		<a class="faculties__item item" href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>">
			<div class="side side--front">
				<?php
					if ( ! empty( $entry[ 'logo' ] ) ) {
						$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $entry[ 'logo' ] ) );
						if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
							$entry[ 'logo' ] = wp_get_attachment_image_url( $thumbnail_id, 'medium', false );
						}
					}
				?>
				<img class="logo lazy" src="#" data-src="<?php echo esc_attr( $entry[ 'logo' ] ); ?>" alt="<?php echo esc_attr( $entry[ 'name' ] ); ?>" />
			</div>
			<div class="side side--back">
				<h3 class="title"><?php echo $entry[ 'name' ] ?></h3>
				<?php if ( array_key_exists( 'excerpt', $entry ) ) : ?>
					<div class="excerpt"><?php echo $entry[ 'excerpt' ]; ?></div>
				<?php endif; ?>	
			</div>
		</a>
	</div>
<?php endif; ?>