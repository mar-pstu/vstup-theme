<div class="graduate">
	<h3 class="name"><?php echo $name; ?></h3>
	<div class="thumbnail">
		<img class="wp-post-tumbnail" src="#" data-lazy="<?php echo esc_attr( $foto ); ?>" alt="<?php echo esc_attr( $name ); ?>">
	</div>
	<?php if ( ! empty( $specialty[ 'thumbnail' ] ) ) : ?>
		<a class="sector" href="<?php echo esc_attr( $specialty[ 'permalink' ] ); ?>">
			<img src="#" data-lazy="<?php echo esc_attr( $specialty[ 'thumbnail' ] ); ?>">
		</a>
	<?php endif; ?>
	<?php if ( ! empty( $specialty[ 'title' ] ) ) : ?>
		<a class="specialty" href="<?php echo esc_attr( $specialty[ 'permalink' ] ); ?>">
			<?php echo $specialty[ 'title' ]; ?>
		</a>
	<?php endif; ?>
	<?php if ( ! empty( $excerpt ) ) : ?>
		<div class="excerpt">
			<?php echo $excerpt; ?>
		</div>
	<?php endif; ?>
</div>