<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {
	
	/**
	 * Секция настроек блоков главной страницы
	 **/
	$wp_customize->add_panel(
		VSTUP_SLUG . '_home',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки главной страницы', VSTUP_TEXTDOMAIN ),
			'priority'        => 200
		]
	);

	/**
	 * Секция "списков" темы
	 **/
	$wp_customize->add_panel(
		VSTUP_SLUG . '_lists',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', VSTUP_TEXTDOMAIN ),
			'priority'        => 201
		]
	);

	/**
	 * Секция "списков" темы
	 **/
	$wp_customize->add_panel(
		VSTUP_SLUG . '_blocks',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', VSTUP_TEXTDOMAIN ),
			'priority'        => 202
		]
	);

} );