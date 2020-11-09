<div class="section videos" id="videos">
	<div class="container"> 
		
		<?php
			if ( isset( $content ) && ! empty( $content ) ) {
				echo $content;
			}
		?>

		<?php if ( isset( $socials ) && ( is_array( $socials ) && array_key_exists( 'youtube', $socials ) ) ) : ?>
			<p class="text-center">
				<a class="youtube-link" href="<?php echo esc_attr( $socials[ 'youtube' ] ); ?>" target="_blank">
					<span class="label"><?php _e( 'Мы на YouTube', VSTUP_TEXTDOMAIN ); ?></span>
				</a>
			</p>
		<?php endif ?>

	</div>
</div>