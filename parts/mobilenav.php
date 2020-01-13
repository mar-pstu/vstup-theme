<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<div class="mobilenav" id="mobilenav">
	<div class="bg navtoggle"></div>
	<div class="overlay">
		<h2><?php _e( 'Меню', VSTUP_TEXTDOMAIN ); ?></h2>
		<div id="mobilenav-list"></div>
		<ul class="warning list-inline small">
			<li><a href="#">Официальная информация</a></li>
			<li><a href="#">Услуги</a></li>
		</ul>
		<h3><?php _e( 'Поделиться', VSTUP_TEXTDOMAIN ); ?></h3>
		<?php the_share(); ?>
	</div>
</div>