<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<button class="open-search-modal-button" id="open-search-modal-button" style="visibility: hidden;">
	<span class="sr-only"><?php _e( 'Открыть поиск', VSTUP_TEXTDOMAIN ) ?></span>
</button>

<div id="panel-search-modal" style="display: none; max-width: 640px;">

	<?php get_search_form( true ); ?>

	<?php if ( is_active_sidebar( 'search_modal_side' ) ) : ?>
		<div class="row">
			<?php dynamic_sidebar( 'search_modal_side' ); ?>
		</div>
	<?php endif; ?>

</div>