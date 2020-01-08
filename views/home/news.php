<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };


$count = 0;


?>




<div class="news section" id="news">
	<div class="container">
		<div class="row middle-xs">
			<?php if ( ! empty( $heading ) ) : ?>
				<div class="col-xs-12 col-sm">
					<h2><?php echo $heading; ?></h2>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $categories ) ) : ?>
				<div class="col-xs-12 col-sm">
					<?php echo $categories; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="row center-xs">
			<div class="col-xs-12 col-sm-9 col-md-5">
				<div class="row" role="list">

					<?php foreach ( $entries as $entry ) : setup_postdata( $entry ); $count++; ?>

						<?php if ( $count <= 3 ) : ?>

							<div class="col-xs-12 <?php echo ( 3 == $count ) ? 'col-sm-12' : 'col-sm-6'; ?>">
								<a class="<?php echo join( ' ', get_post_class( 'news__thumbnail thumbnail' ) ); ?>" href="<?php the_permalink( $entry->ID ); ?>" role="listitem" id="post-<?php echo $entry->ID; ?>">
									<?php the_thumbnail_image( $entry->ID, 'thumbnail-3x2', 'src' ); ?>
									<h3><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></h3>
								</a>
							</div>

						<?php else : ?>

							<?php if ( 4 == $count ) : ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9 col-md-7">
									<div role="list">
							<?php endif; ?>

										<div class="<?php echo join( ' ', get_post_class( 'news__entry entry' ) ); ?>" id="post-<?php echo $entry->ID; ?>" role="listitem">
											<h3><a href="<?php the_permalink( $entry->ID ); ?>"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></a></h3>
											<?php if ( ! empty( trim( $entry->post_excerpt ) ) ) : ?><p><?php echo $entry->post_excerpt; ?></p><?php endif; ?>
											<p class="text-right">
												<a class="btn btn-success btn-sm permalink" href="<?php the_permalink( $entry->ID ); ?>"><?php _e( 'Подробней', VSTUP_TEXTDOMAIN ); ?></a>
											</p>
										</div>

						<?php endif; ?>

					<?php endforeach; wp_reset_postdata(); ?>

				</div>
			</div>
		</div>
	</div>
</div>