<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	// update_option( "theme_mods_$theme_slug", array_merge( [
	
	 update_option( "theme_mods_$theme_slug", [

		// Главная страница - Первый экран

		// Главная странциа - О нас
		'about_flag'        => true,
		'about_page_id'     => '640',
		'about_title'       => 'Приазовський державний технічний університет',
		'about_description' => "ДВНЗ «Приазовський державний технічний університет», творений  1930 році, є найбільшим закладом вищої освіти Приазов'я. Університет тестовано за найвищим – IV рівнем акредитації України. Він проводить освітню діяльність за європейськими стандартами за всіма напрямами. Підтверджено право ДВНЗ «ПДТУ» вести підготовку за освітньо-професійним ступінем фаховий молодший бакалавр, ступенями вищої освіти бакалавр, магістр, доктор філософії, доктор наук. Університет має потужну сучасну науково-технічну базу, зокрема кампусну IT - інфраструктуру, Спільно з металургійними комбінатами та іншими підприємствами регіону створено Навчальні комплекси «Школа-університет-підприємство»",
		'about_label'       => 'Подробней',
		'about_thumbnail'   => get_custom_logo_src( 'large' ),

		// Главная страница - Носости
		'news_flag'       => true,
		'news_terms_number' => 2,
		'news_categories' => [ '2546', '2566' ],
		'news_numberposts' => 5,
		'news_title'      => 'Новини',
		'news_numberentries' => 6,
		'news_entries'    => [],

		// главная странциа - Начни с нами
		'action_flag'     => true,
		'action_page_id'  => '2330',
		'action_title'    => 'Почни з нами',
		'action_excerpt'  => '',
		'action_label'    => 'Вступ 2020',
		'action_bgi'      => get_theme_file_path( '/images/action/bg.jpg' ),
		'action_thumbnail' => get_custom_logo_src( 'thumbnail' ),
		'action_video'    => '',

		// преимущества
		'advantages_number' => 3,
		'advantages'      => [
			[
				'value'     => '80',
				'label'     => 'спеціальностей',
				'link'      => '#',
				'image'     => '',
			],
			[
				'value'     => '20',
				'label'     => 'європейських проектів',
				'link'      => '#',
				'image'     => '',
			],
			[
				'value'     => '90',
				'label'     => 'років історії',
				'link'      => '#',
				'image'     => '',
			],
		],

	] );

	// ], $mods ) );
}

add_action( 'after_switch_theme', 'vstup\setup_default_mods' );