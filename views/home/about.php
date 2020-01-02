<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; }


?>


<section class="section about" id="about">
	<div class="container">
		<div class="row middle-xs center-xs">
			<?php if ( ! empty( $thumbnail_src ) ) : ?>
				<div class="col-xs-12 col-sm-9 col-md-5">
					<img class="lazy logo" src="#" data-src="<?php echo  esc_attr( $thumbnail_src ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
				</div>
			<?php endif; ?>
			<div class="col-xs-12 col-sm-9 col-md">
				<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
				<?php if ( ! empty( $description ) ) : ?><p><?php echo strip_tags( $description, '<b><a><i>' ); ?></p><?php endif; ?>
				<?php the_advantages_list(); ?>
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