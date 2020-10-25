<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="pageheader">
	<div class="container">
		<div class="row middle-xs">
			<?php if ( ! empty( $thumbnail ) ) : ?>
				<div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
					<?php echo $thumbnail; ?>
				</div>
			<?php endif; ?>
			<div class="col-xs col-sm col-md col-lg">
				<h1 class="title"><?php echo $title; ?></h1>
			</div>
		</div>
		<div class="row middle-xs">
			<div class="col-xs-12 col-sm-8 col-md-9">
				<?php the_breadcrumb(); ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3">
				<?php get_template_part( 'parts/share' ); ?>
			</div>
		</div>
	</div>
</div>