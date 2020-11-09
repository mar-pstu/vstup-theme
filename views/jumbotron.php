<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div>

	<div class="jumbotron">

		<div class="bg lazy" <?php echo ( isset( $bgi ) && ! empty( $bgi ) ) ? "data-src=\"{$bgi}\"" : ''; ?> ></div>

		<?php if ( isset( $thumbnail_url ) && ! empty( $thumbnail_url ) ) : ?>
			<img data-lazy="<?php echo  esc_attr( $thumbnail_url ); ?>" style="display: none;">
		<?php endif; ?>
		
		<div class="container">
			
			<?php if ( ! empty( $title ) ) : ?>
				<h3 class="title"><?php echo $title; ?></h3>
			<?php endif; ?>
			
			<?php if ( ! empty( $excerpt ) ) : ?>
				<div class="excerpt"><?php echo  $excerpt; ?></div>
			<?php endif; ?>

			<?php
				if ( isset( $promo_nav_menu ) && ! empty( $promo_nav_menu ) ) {
					wp_nav_menu( [
						'menu'            => $promo_nav_menu, 
						'container'       => false, 
						'container_class' => '', 
						'menu_class'      => 'menu', 
						'echo'            => true,
						'depth'           => 2,
					] );
				}
			?>
			
			<?php if ( ! empty( $permalink ) ) : ?>
				<a href="<?php echo esc_attr( $permalink ); ?>" class="btn btn-success"><?php echo $label; ?></a>
			<?php endif; ?>

			<div class="blogname"><?php echo get_theme_mod( 'firstscreen_bg_title', get_bloginfo( 'name', 'raw' ) ); ?></div>

		</div>

	</div>

</div>