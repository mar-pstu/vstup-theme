<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;

$category_ids = get_theme_mod( 'news_categories' );

$news_entries = get_theme_mod( 'news_entries' );

$news_title = get_theme_mod( 'news_title' );

$news_label = get_theme_mod( 'news_label' );

$news_permalink = get_theme_mod( 'news_permalink' );

include get_theme_file_path( 'views/home/news-before.php' );

// выводим список записей с превью
if ( is_array( $news_entries ) && ! empty( $news_entries ) && count( $news_entries ) >= 3 ) {

	$news_entries_number = get_theme_mod( 'news_numberentries' );
	if ( count( $news_entries ) > $news_entries_number ) {
		$news_entries = array_slice( $news_entries, 0, $news_entries_number );
	}


	if ( file_exists( $entries_init_script_path = get_theme_file_path( 'scripts/init/news-list-entries.js' ) ) ) {
		wp_enqueue_style( 'slick' );
		wp_enqueue_scripts( 'slick' );
		wp_add_inline_script( 'slick', file_get_contents( $entries_init_script_path ), 'after' );
	}
 
	while ( 0 != count( $news_entries ) % 3 ) {
		$news_entries[] = current( $news_entries );
		next( $news_entries );
	}

	include get_theme_file_path( 'views/home/news-list-entries-before.php' );

	reset( $news_entries );

	include get_theme_file_path( 'views/home/news-list-before_slide.php' );
	foreach ( $news_entries as $index => $entry ) {
		$entry = array_merge( [
			'title' => '',
			'link'  => '',
			'thumbnail' => '',
		], $entry );
		if ( ! empty( $entry[ 'thumbnail' ] ) ) {
			$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $entry[ 'thumbnail' ] ) );
			if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
				$entry[ 'thumbnail' ] = wp_get_attachment_image_url( $thumbnail_id, 'thumbnail-medium', false );
			}
		}
		include get_theme_file_path( 'views/home/news-list-entry.php' );
		if ( 3 == $index + 1 ) {
			include get_theme_file_path( 'views/home/news-list-after_slide.php' );
			include get_theme_file_path( 'views/home/news-list-before_slide.php' );
		}
	}
	include get_theme_file_path( 'views/home/news-list-after_slide.php' );
	include get_theme_file_path( 'views/home/news-list-entries-after.php' );

}

// выводим вкладки с категориями постов
if ( is_array( $category_ids ) && ! empty( $category_ids ) ) {
	if ( file_exists( $categories_init_script_path = get_theme_file_path( 'scripts/init/news-categories.js' ) ) ) {
		wp_enqueue_script( 'vstup-public' );
		wp_add_inline_script( 'vstup-public', file_get_contents( $categories_init_script_path ), 'after' );
	}
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
		$all_category_entries = get_posts( [
			'numberposts' => get_theme_mod( 'news_numberposts' ),
			'category'    => implode( ',', $category_ids ),
		] );
		if ( is_array( $all_category_entries ) && ! empty( $all_category_entries ) ) {
			include get_theme_file_path( 'views/home/news-categories-list-item_before.php' );
			foreach ( $all_category_entries as $entry ) {
				setup_postdata( $post = $entry );
				include get_theme_file_path( 'views/home/news-categories-list-entry.php' );
			}
			include get_theme_file_path( 'views/home/news-categories-list-item_after.php' );
		}
		foreach ( $categories as $category ) {
			$category_entries = get_posts( [
				'numberposts' => get_theme_mod( 'news_numberposts' ),
				'exclude'     => wp_list_pluck( $all_category_entries, 'ID', null ),
				'tax_query'   => [
					'relation'  => 'AND',
					[
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => $category,
						'operator' => 'IN',
						'include_children' => true,
					]
				],
			] );
			if ( is_array( $category_entries ) && ! empty( $category_entries ) ) {
				include get_theme_file_path( 'views/home/news-categories-list-item_before.php' );
				foreach ( $category_entries as $entry ) {
					setup_postdata( $post = $entry );
					include get_theme_file_path( 'views/home/news-categories-list-entry.php' );
				}
				include get_theme_file_path( 'views/home/news-categories-list-item_after.php' );
			}
		};
		include get_theme_file_path( 'views/home/news-categories-list-after.php' );
		include get_theme_file_path( 'views/home/news-categories-after.php' );
	}
}

include get_theme_file_path( 'views/home/news-after.php' );