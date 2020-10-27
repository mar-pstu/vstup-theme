<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };

?>


<div class="graduate">

	<?php if ( isset( $name ) && ! empty( $name ) ) : ?>
		<h3 class="name">
			<?php echo $name; ?>
		</h3>
	<?php endif; ?>
	
	<?php if ( isset( $foto ) && ! empty( $foto ) && isset( $name ) && ! empty( $name ) ) : ?>
		<div class="thumbnail">
			<img class="wp-post-tumbnail" src="#" data-lazy="<?php echo esc_attr( $foto ); ?>" alt="<?php echo esc_attr( $name ); ?>">
		</div>
	<?php endif; ?>
	
	<?php if ( isset( $specialty_thumbnail ) && ! empty( $specialty_thumbnail ) && isset( $specialty_thumbnail ) && ! empty( $specialty_thumbnail ) ) : ?>
		<a class="sector" href="<?php echo esc_attr( $specialty_permalink ); ?>">
			<img src="#" data-lazy="<?php echo esc_attr( $specialty_thumbnail ); ?>">
		</a>
	<?php endif; ?>
	
	<?php if ( isset( $specialty_title ) && ! empty( $specialty_title ) && isset( $specialty_permalink ) && ! empty( $specialty_permalink ) ) : ?>
		<a class="specialty" href="<?php echo esc_attr( $specialty_permalink ); ?>">
			<?php echo $specialty_title; ?>
		</a>
	<?php endif; ?>
	
	<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
		<div class="excerpt">
			<?php echo $excerpt; ?>
		</div>
	<?php endif; ?>

</div>