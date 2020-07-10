<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };


the_pageheader();


?>

<div class="container">

<?php


	if ( have_posts() ) {

		while ( have_posts() ) {

			the_post();

			?>

				<div <?php post_class( 'search__entry entry', get_the_ID() ); ?> id="post-<?php the_ID(); ?>">
					<h3 class="title"><a href="<?php the_permalink(); ?>"><?php echo search_backlight( get_the_title( get_the_ID() ) ); ?></a></h3>
					<div class="small"><?php the_date( get_option( 'date_format' ), '', '',  true ) ?></div>
					<div class="excerpt"><?php echo search_backlight( get_the_excerpt( get_the_ID() ) ); ?></div>
				</div>

			<?php
			
		}

		the_posts_pagination( array(
			'show_all'     => false, // показаны все страницы участвующие в пагинации
			'end_size'     => 1,     // количество страниц на концах
			'mid_size'     => 1,     // количество страниц вокруг текущей
			'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
			'prev_text'    => '«',
			'next_text'    => '»',
			'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
			'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
			'screen_reader_text' => __( 'Posts navigation' ),
		) );

	} else {
		echo '<p>' . __( 'К сожалению ничего не найдено. Попробуйте изменить поисковый запрос.', VSTUP_TEXTDOMAIN ) . '</p>';
	}

?>


</div>