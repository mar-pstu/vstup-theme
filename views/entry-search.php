<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div <?php post_class( 'search__entry entry', get_the_ID() ); ?> id="post-<?php the_ID(); ?>">
	<h3 class="title"><a href="<?php the_permalink(); ?>"><?php echo search_backlight( get_the_title( get_the_ID() ) ); ?></a></h3>
	<div class="small"><?php the_date( get_option( 'date_format' ), '', '',  true ) ?></div>
	<div class="excerpt"><?php echo search_backlight( get_the_excerpt( get_the_ID() ) ); ?></div>
</div>