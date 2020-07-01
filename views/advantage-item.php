<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="col-xs-6 col-sm-4">
	<a class="advantage" href="<?php echo esc_attr( $link ); ?>" role="listitem">
		<span class="bg lazy" data-src="<?php echo esc_attr( $image ); ?>"></span>
		<span class="value"><?php echo $value; ?></span>
		<span class="label"><?php echo $label; ?></span>
	</a>
</div>