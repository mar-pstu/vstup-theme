<div class="jumbotron">
	<div class="bg lazy" data-src="<?php echo esc_attr( $bgi ); ?>"></div>
	<?php if ( ! empty( $thumbnail_url ) ) : ?><img data-lazy="<?php echo  esc_attr( $thumbnail_url ); ?>" style="display: none;"><?php endif; ?>
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
		<?php if ( ! empty( $excerpt ) ) : ?><div class="excerpt"><?php echo  $excerpt; ?></div><?php endif; ?>
		<?php echo $page_menu; ?>
		<?php if ( ! empty( $permalink ) ) : ?><a href="<?php echo esc_attr( $permalink ); ?>" class="btn btn-success"><?php echo $label; ?></a><?php endif; ?>
		<?php echo $warning_menu; ?>
	</div>
</div>