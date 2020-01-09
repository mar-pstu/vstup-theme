<section class="section people" id="people">
	<div class="container">
		<div class="row row-reverce center-xs middle-xs">
			<div class="col-xs-12 col-sm-9 col-md col-lg col-md-offset-1">
				<div class="wrap">
					<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
					<?php if ( ! empty( $description ) ) : ?><div class="description"><?php echo $description; ?></div><?php endif; ?>
					<?php if ( ! empty( $permalink ) ) : ?><p><a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p><?php endif; ?>
				</div>
			</div>
			<?php if ( ! empty( $peoples ) ) : ?>
				<div class="col-xs-12 col-sm-9 col-md-5 col-lg-4 first-md">
					<?php echo $peoples; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>