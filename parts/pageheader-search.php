<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = __( 'Поиск по сайту', VSTUP_TEXTDOMAIN );
$description = sprintf(
	'%1$s: <span class="bg-success">%2$s</span>',
	__( 'Вы искали', VSTUP_TEXTDOMAIN ),
	get_search_query()
);


include get_theme_file_path( 'views/pageheader.php' );