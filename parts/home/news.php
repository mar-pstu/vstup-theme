<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;

$category_ids = get_theme_mod( 'news_categories' );

$news_entries = get_theme_mod( 'news_entries' );

$news_title = get_theme_mod( 'news_title' );

include get_theme_file_path( 'views/home/news-before.php' );

// выводим список записей с превью
if ( is_array( $news_entries ) && ! empty( $news_entries ) && count( $news_entries ) >= 3 ) {

	wp_enqueue_style( 'slick' );
	wp_enqueue_scripts( 'slick' );
	if ( file_exists( $entries_init_script_path = get_theme_file_path( 'scripts/news-list-entries-init.js' ) ) ) {
		wp_add_inline_script( 'slick', file_get_contents( $entries_init_script_path ), 'after' );
	}

	include get_theme_file_path( 'views/home/news-list-entries-before.php' );

	// echo '<pre>'; var_dump( current( $news_entries ) ); echo '</pre>';

	// while ( 0 != intdiv( key( $news_entries ) + 1, 3 ) ) {
	// 	echo '<pre>'; var_dump( current( $news_entries ) ); echo '</pre>';
	// 	$news_entries[] = current( $news_entries );
	// 	next( $news_entries );
	// }

	reset( $news_entries );
	include get_theme_file_path( 'views/home/news-list-before_slide.php' );
	foreach ( $news_entries as $index => $entry ) {
		$entry = array_merge( [
			'title' => '',
			'link'  => '',
			'tumbnail' => '',
		], $entry );
		include get_theme_file_path( 'views/home/news-list-entry.php' );
		if ( 3 == $index + 1 ) {
			include get_theme_file_path( 'views/home/news-list-after_slide.php' );
		}
	}
	include get_theme_file_path( 'views/home/news-list-entries-after.php' );

}

// выводим вкладки с категориями постов
if ( is_array( $category_ids ) && ! empty( $category_ids ) ) {
	$categories = get_terms( [
		'include' => $category_ids,
	], '' );
	if ( is_array( $categories ) && ! empty( $categories ) ) {
		include get_theme_file_path( 'views/home/news-categories-before.php' );
		
		include get_theme_file_path( 'views/home/news-categories-names-before.php' );
		echo implode( "\r\n", array_map( function ( $category ) {
			return sprintf(
				'<a class="item" role="listitem" href="#%1$s">%2$s</a>',
				$category->slug,
				$category->name
			);
		}, $categories ) );
		include get_theme_file_path( 'views/home/news-categories-names-after.php' );
		include get_theme_file_path( 'views/home/news-categories-list-before.php' );
		$category_entries = get_posts( [
			'numberposts' => 5,
			'category'    => implode( ',', $category_ids ),
		] );
		// do {
		// 	$category_current = current( $categories );
		// 	$category_entries = get_posts( [
		// 		'numberposts' => 5,
		// 		'tax_query'   => [

		// 		],
		// 	] );
		// 	if ( is_array( $category_entries ) && ! empty( $category_entries ) ) {
		// 		echo sprintf(
		// 			'',
		// 			implode( "\r\n", array_map(callback, arr1) )
		// 		);
		// 		include get_theme_file_path( 'views/home/news-categories-list-item_before.php' );
		// 		foreach ( $category_entries as $entry ) {
		// 			setup_postdata( $post = $entry );
		// 			include get_theme_file_path( 'views/home/news-categories-list-entry.php' );
		// 		}
		// 		include get_theme_file_path( 'views/home/news-categories-list-item_after.php' );
		// 	}
		// 	next( $categories );
		// } while ( $category_current );
		include get_theme_file_path( 'views/home/news-categories-list-after.php' );
		include get_theme_file_path( 'views/home/news-categories-after.php' );
	}
}

include get_theme_file_path( 'views/home/news-after.php' );