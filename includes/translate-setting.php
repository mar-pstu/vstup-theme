<?php


namespace vstup;


function add_settings_translations () {

	/**
	 * Переводы строк
	 * */
	foreach ( [
		'about_title',
		'about_description',
		'about_label',
		'news_title',
		'action_title',
		'action_excerpt',
		'action_label',
		'about_title',
		'about_description',
		'about_label',
		'action_title',
		'action_excerpt',
		'action_label',
		'faculties_title',
		'faculties_excerpt',
		'people_title',
		'people_label',
		'services_title',
		'services_label',
		'questions_title',
		'questions_label',
		'questions_permalink',
		'questions_form',
	] as $name ) {
		add_filter( 'theme_mod_' . $name, 'pll__', 10, 1 );
	}

	/**
	 * Переводы массивов категорий
	 * */
	foreach ( [
		'news_categories'
	] as $name ) {
		add_filter( "theme_mod_{$name}", function ( $terms ) {
			if ( ! is_array( $terms ) ) {
				$terms = [ $terms ];
			}
			$terms = array_map( 'pll_get_term', array_filter( array_map( 'absint', $terms ) ) );
			return $terms;
		}, 10, 1 );
	}

	/**
	 * Перевод массивов новостей, факультетов
	 * */
	if ( is_front_page() ) {
		foreach ( [
			'firstscreen'  => [
				'title'      => 'pll__',
				'excerpt'    => 'pll__',
				'permalink'  => 'pll__',
				'label'      => 'pll__',
			],
			'news_entries' => [
				'title'      => 'pll__',
				'link'       => 'pll__',
			],
			'faculties'    => [
				'name'       => 'pll__',
				'excerpt'    => 'pll__',
				'permalink'  => 'pll__',
			],
			'videos'       => [
				'label'      => 'pll__',
				'description' => 'pll__',
			],
			'graduates'    => [
				'name'       => 'pll__',
				'excerpt'    => 'pll__',
				'specialty_title' => 'pll__',
				'specialty_permalink' => 'pll__',
				'specialty_thumbnail' => 'pll__',
			],
		] as $name => $atts ) {
			add_filter( 'theme_mod_' . $name, function ( $news ) use ( $atts ) {
				if ( ! is_array( $news ) ) {
					$news = [ $news ];
				}
				$news = array_map( function ( $item ) {
					if ( ! is_array( $item ) ) {
						$item = [];
					}
					$item = array_merge( array_map( '__return_empty_string', array_flip( $atts ) ), $item );
					foreach ( $atts as $key => $callback ) {
						if ( empty( trim( $item[ $key ] ) ) ) {
							$item[ $key ] = $callback( $item[ $key ] );
						}
					}
					return $item;
				}, $news );
				return $news;
			}, 10, 1 );
		}
	}


	/**
	 * Перевод списка контактов и социальных сетей
	 * */
	foreach ( [ 'contacts', 'socials' ] as $key ) {
		add_filter( 'theme_mod_' . $key, function ( $list ) {
			if ( is_array( $list ) && ! empty( $list ) ) {
				$list = array_map( 'pll__', $list );
			}
			return $list;
		}, 10, 1 );
	}


	/**
	 * Перевод постоянных страниц
	 **/
	foreach ( [
		'about_page_id',
		'action_page_id',
		'people_page_id',
		'services_page_id',
	] as $name ) {
		add_filter( "theme_mod_{$name}", 'pll_get_post', 10, 1 );
	}

}

add_action( 'plugins_loaded', 'add_settings_translations', 10, 1 );