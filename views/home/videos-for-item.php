<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $i ) && isset( $permalink ) && ! empty( $permalink ) ) : ?>
	<div class="videos__item item <?php echo ( 0 == $i ) ? 'active' : 'inactive'; ?>" id="video-item-<?php echo $i; ?>">
		<div class="row middle-xs center-xs">

			<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="description">
						<?php echo $description; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( isset( $thumbnail ) && ! empty( $thumbnail ) && isset( $label ) ) : ?>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 first-md">
					<a class="permalink fancybox" href="<?php echo esc_attr( $permalink ); ?>">
						<img
							class="lazy"
							src="#"
							data-src="<?php echo esc_attr( $thumbnail ); ?>"
							alt="<?php echo esc_attr( $label ); ?>"
						/>
					</a>
				</div>
			<?php endif; ?>

		</div>
	</div>
<?php endif; ?>