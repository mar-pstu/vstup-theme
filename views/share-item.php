<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $key ) && isset( $share ) && isset( $label ) ) : ?>
	<li><a class="<?php echo esc_attr( $key ); ?>" target="_blank" href="<?php echo esc_attr( $share ); ?>"><span class="sr-only"><?php echo esc_attr( $label ); ?></span></a></li>
<?php endif; ?>