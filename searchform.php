

<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>


<form class="searchform form" role="search" method="get" action="<?php echo home_url( '/' ) ?>"> 
	<input class="form-control" type="text" value="<?php echo get_search_query() ?>" name="s">
	<button class="searchsubmit" type="submit">
		<span class="sr-only"><?php _e( 'Найти', VSTUP_TEXTDOMAIN ); ?></span>
	</button>
</form>