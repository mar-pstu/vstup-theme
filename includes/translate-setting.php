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
		'action_title',
		'action_excerpt',
		'action_label',
		'about_title',
		'about_description',
		'about_label',
		'action_title',
		'action_excerpt',
		'action_label',
	] as $name ) {
		add_filter( "theme_mod_{$name}", 'pll__', 10, 1 );
	}

	/**
	 * Перевод постоянных страниц
	 **/
	foreach ( [
		'about_page_id',
		'action_page_id',
	] as $name ) {
		add_filter( "theme_mod_{$name}", 'pll_get_post', 10, 1 );
	}

}

add_action( 'plugins_loaded', 'add_settings_translations', 10, 1 );