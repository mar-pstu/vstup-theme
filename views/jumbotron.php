<div class="jumbotron">
	<div class="bg"></div>
	<?php if ( ! empty( $bgi ) ) : ?><img data-lazy="<?php echo  esc_attr( $bgi ); ?>" style="display: none;"><?php endif; ?>
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
		<?php if ( ! empty( $excerpt ) ) : ?><div class="excerpt"><?php echo  $excerpt; ?></div><?php endif; ?>
		<?php echo $page_menu; ?>
		<?php if ( ! empty( $permalink ) ) : ?><a href="<?php echo esc_attr( $permalink ); ?>" class="btn btn-success"><?php echo $label; ?></a><?php endif; ?>
		<?php echo $nav_menu; ?>
	</div>
</div>