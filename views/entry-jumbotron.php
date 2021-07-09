<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] && array_key_exists( 'title', $entry ) ) : ?>
	<div>

		<div class="jumbotron">

			<?php
				$bgi_attr = '';
				if ( array_key_exists( 'bgi', $entry ) && is_array( $entry[ 'bgi' ] ) && array_key_exists( 'id', $entry[ 'bgi' ] ) && absint( $entry[ 'bgi' ][ 'id' ] ) ) {
					$bgi_src = wp_get_attachment_image_url( $entry[ 'bgi' ][ 'id' ], wp_is_mobile() ? 'large' : 'full', false );
					if ( $bgi_src && is_url( $bgi_src ) ) {
						$bgi_attr = sprintf( is_customize_preview() ? 'data-src="%1$s"' : 'style="background-image: url(%1$s);"', esc_attr( $bgi_src ) );
					}
				}
			?>
			<div class="bg lazy" <?php echo $bgi_attr; ?> ></div>
			
			<div class="container">
				
				<h3 class="title"><?php echo $entry[ 'title' ]; ?></h3>
				
				<?php if ( array_key_exists( 'excerpt', $entry ) && ! empty( $entry[ 'excerpt' ] ) ) : ?>
					<div class="excerpt"><?php echo  $entry[ 'excerpt' ]; ?></div>
				<?php endif; ?>

				<?php
					if ( array_key_exists( 'nav_menu', $entry ) && ! empty( $entry[ 'nav_menu' ] ) ) {
						wp_nav_menu( [
							'menu'            => $entry[ 'nav_menu' ],
							'container'       => false, 
							'container_class' => '', 
							'menu_class'      => 'menu', 
							'echo'            => true,
							'depth'           => 2,
						] );
					}
				?>
				
				<?php if ( array_key_exists( 'permalink', $entry ) && is_url( $entry[ 'permalink' ] ) && array_key_exists( 'label', $entry ) && ! empty( $entry[ 'label' ] ) ) : ?>
					<a href="<?php echo esc_attr( $entry[ 'permalink' ] ); ?>" class="btn btn-success btn-lg"><?php echo $entry[ 'label' ]; ?></a>
				<?php endif; ?>

				<div class="blogname"><?php echo get_theme_mod( 'firstscreen_bg_title', get_bloginfo( 'name', 'raw' ) ); ?></div>

			</div>

		</div>

	</div>
<?php endif; ?>