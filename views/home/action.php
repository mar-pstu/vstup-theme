<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>

<section class="section action lazy" id="action" data-src="<?php echo esc_attr( $bgi ); ?>">
	<div class="container">
		<div class="row middle-xs center-xs reverce">
			<div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 text-center">
				<?php if ( ! empty( $video ) ) : ?>
					<a class="play fancybox" href="<?php echo esc_attr( $video ); ?>">
						<span class="sr-only"><?php _e( 'Смотреть видео', VSTUP_TEXTDOMAIN ); ?></span>
					</a>
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 text-center">
				<?php if ( ! empty( $thumbnail ) ) : ?><img class="lazy logo" src="#" data-src="<?php echo esc_attr( $thumbnail ); ?>"><?php endif; ?>
				<?php if ( ! empty( $title ) ) : ?><h2 class="title"><?php echo $title; ?></h2><?php endif; ?>
				<?php if ( ! empty( $excerpt ) ) : ?><div class="excerpt"><?php echo $excerpt; ?></div><?php endif; ?>
				<?php if ( ! empty( $permalink ) ) : ?>
					<p>
						<a class="btn btn-success" href="<?php echo  esc_attr( $permalink ); ?>">
							<?php echo $label; ?>
						</a>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>