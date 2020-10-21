<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {
	
	$slug = VSTUP_SLUG;
	
	/**
	 * Секция настроек блоков главной страницы
	 **/
	$wp_customize->add_panel(
		"{$slug}_home",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки главной страницы', VSTUP_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	
	foreach ( [
		'firstscreen',
		'about',
		'news',
		'action',
		'faculties',
		'videos',
		'people',
		'services',
		'questions',
	] as $path_name ) {
		include get_theme_file_path( "settings/home/{$path_name}.php" );
	}

	/**
	 * Секция "списков" темы
	 **/
	$wp_customize->add_panel(
		"{$slug}_lists",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', VSTUP_TEXTDOMAIN ),
			'priority'        => 300
		)
	);

	foreach ( [
		'advantages',
		'partners',
		'contacts',
		'socials',
		'graduate-list',
		'list-of-services',
	] as $path_name ) {
		include get_theme_file_path( "settings/lists/{$path_name}.php" );
	}


} );