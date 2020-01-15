<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
	<a class="flatitem lazy" href="<?php echo esc_attr( $permalink ); ?>" data-src="<?php echo esc_attr( $thumbnail ); ?>">
		<div class="title"><?php echo $title; ?></div>
	</a>
</div>