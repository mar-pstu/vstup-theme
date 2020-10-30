<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		include get_theme_file_path( 'views/entry-search.php' );
		
	}

	the_posts_pagination( [
		'show_all'     => false, // показаны все страницы участвующие в пагинации
		'end_size'     => 1,     // количество страниц на концах
		'mid_size'     => 1,     // количество страниц вокруг текущей
		'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
		'prev_text'    => '«',
		'next_text'    => '»',
		'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
		'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
		'screen_reader_text' => __( 'Posts navigation' ),
	] );

} else {

	include get_theme_file_path( 'views/search-no-posts.php' );

}