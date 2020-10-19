<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<a
	id="post-<?php the_ID(); ?>"
	<?php post_class( 'news__entry entry', get_the_ID() ); ?>
	href="<?php the_permalink(); ?>"
>

	<h3><?php the_title( '', '', true ); ?></h3>

	<?php the_excerpt(); ?>

</a>