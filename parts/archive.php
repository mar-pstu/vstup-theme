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

				<div class="archive__entry entry">
					<div class="row center-xs middle-xs">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a class="thumbnail" href="<?php the_permalink(); ?>">
								<?php the_thumbnail_image( get_the_ID(), 'medium' ); ?>
							</a>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-8">
							<div class="overlay">
								<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="excerpt"><?php the_excerpt(); ?></div>
								<p><a class="btn btn-sm btn-success" href="<?php the_permalink(); ?>"><?php _e( 'Подробней', VSTUP_TEXTDOMAIN ); ?></a></p>
							</div>
						</div>
					</div>
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

	}

?>


</div>