<section class="section videos" id="videos">
	<div class="container"> 
		
		<h2 class="hide"><?php _e( 'Видео', VSTUP_TEXTDOMAIN ); ?></h2>

		<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
			<div class="slider">
				<div id="videos-list">
					<?php echo $content; ?>
				</div>
				<div class="slider-controls" id="videos-controls">
					<button class="slider-arrow prev" id="videos-arrow-prev"><span class="sr-only"><?php _e( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ); ?></span></button>
					<button class="slider-arrow next" id="videos-arrow-next"><span class="sr-only"><?php _e( 'Следующий слайд', VSTUP_TEXTDOMAIN ); ?></span></button>
				</div>
			</div>
		<?php endif ?>

		<?php if ( isset( $socials ) && ( is_array( $socials ) && array_key_exists( 'youtube', $socials ) ) ) : ?>
			<p class="text-center">
				<a class="youtube-link" href="<?php echo esc_attr( $socials[ 'youtube' ] ); ?>" target="_blank">
					<span class="label"><?php _e( 'Мы на YouTube', VSTUP_TEXTDOMAIN ); ?></span>
				</a>
			</p>
		<?php endif ?>

	</div>
</section>