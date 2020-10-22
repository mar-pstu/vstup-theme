<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {
	
	/**
	 * Секция настроек блоков главной страницы
	 **/
	$wp_customize->add_panel(
		VSTUP_SLUG . '_home',
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки главной страницы', VSTUP_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	
	foreach ( apply_filters( 'get_home_parts', [] ) as $path_name ) {
		if ( $path_name ) {
			include get_theme_file_path( "settings/home/{$path_name}.php" );
		}
	}

	/**
	 * Секция "списков" темы
	 **/
	$wp_customize->add_panel(
		VSTUP_SLUG . '_lists',
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