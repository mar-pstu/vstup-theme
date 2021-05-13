<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


	<?php if ( is_single() ) : ?>
		<div class="text-right small">
			<?php _e( 'Опубликовано', VSTUP_TEXTDOMAIN ); ?> <time datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'j F Y' ); ?></time> 
		</div>
	<?php  endif; ?>

</div>