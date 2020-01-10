<section class="section specialties" id="specialties">
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm">
				<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
				<?php if ( ! empty( $excerpt ) ) : ?><p><?php echo $excerpt; ?></p><?php endif; ?>
				<?php if ( ! empty( $permalink ) ) : ?>
					<p>
						<a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>">
							<?php echo $label; ?>
						</a>
					</p>
				<?php endif; ?>
			</div>
			
			<?php if ( ! empty( $specialties ) ) : ?>
				<div class="col-xs-12 col-sm-8">
					<?php echo $specialties; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>