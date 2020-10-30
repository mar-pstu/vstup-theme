<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="pageheader">
	<div class="container">
		<h1 class="title"><?php echo $title; ?></h1>
		<div class="row middle-xs">
			<div class="col-xs-12 col-sm-8 col-md-9">
				<?php get_template_part( 'parts/breadcrumbs' ); ?>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3">
				<?php get_template_part( 'parts/share' ); ?>
			</div>
		</div>
	</div>
</div>