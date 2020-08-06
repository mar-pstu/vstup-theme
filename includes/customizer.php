<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {
	$slug = VSTUP_SLUG;
	$wp_customize->add_panel(
		"{$slug}_home",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Секции главной страницы', VSTUP_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	$wp_customize->add_panel(
		"{$slug}_list",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', VSTUP_TEXTDOMAIN ),
			'priority'        => 300
		)
	);
	include get_theme_file_path( 'customizer/home/firstscreen.php' );
	include get_theme_file_path( 'customizer/home/about.php' );
	include get_theme_file_path( 'customizer/home/news.php' );
	include get_theme_file_path( 'customizer/home/action.php' );
	include get_theme_file_path( 'customizer/home/videos.php' );
	include get_theme_file_path( 'customizer/home/people.php' );
	include get_theme_file_path( 'customizer/home/services.php' );
	include get_theme_file_path( 'customizer/home/questions.php' );
	include get_theme_file_path( 'customizer/advantages.php' );
	include get_theme_file_path( 'customizer/partners.php' );
	include get_theme_file_path( 'customizer/contacts.php' );
	include get_theme_file_path( 'customizer/socials.php' );
	include get_theme_file_path( 'customizer/graduate-list.php' );
	include get_theme_file_path( 'customizer/list-of-services.php' );
} );