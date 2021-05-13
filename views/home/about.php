<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; }


?>


<section class="section about" id="about">
	<div class="container">
		<div class="row middle-xs center-xs">
			<?php if ( isset( $thumbnail_src ) && ! empty( $thumbnail_src ) ) : ?>
				<div class="col-xs-12 col-sm-9 col-md-5">
					<?php if ( isset( $thumbnail_link ) && is_url( $thumbnail_link ) ) : ?>
						<a class="logo" href="<?php echo esc_attr( $thumbnail_link ); ?>">
							<img class="lazy" src="#" data-src="<?php echo  esc_attr( $thumbnail_src ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
						</a>
					<?php else : ?>
						<img class="lazy logo" src="#" data-src="<?php echo  esc_attr( $thumbnail_src ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="col-xs-12 col-sm-9 col-md">
				<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
				<?php if ( ! empty( $description ) ) : ?><p><?php echo strip_tags( $description, '<b><a><i>' ); ?></p><?php endif; ?>
				<?php echo get_advantages_list(); ?>
				<?php if ( ! empty( $permalink ) ) : ?>
					<p>
						<a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>">
							<?php echo $label; ?>
						</a>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>