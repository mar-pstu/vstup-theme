<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Модальное окно поиска', VSTUP_TEXTDOMAIN ),
		'id'               => 'search_modal_side',
		'description'      => __( 'Отображается в модальном окне поиска. Модальное окно вызывается в шапке сайта. Выводится в две колонки.', VSTUP_TEXTDOMAIN ),
		'class'            => 'search-modal-sidebar',
		'before_widget'    => '<div class="col-xs-12 col-sm-6"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
	$asides = array_merge( [ [
		'name'          => __( 'Сайдбар подвала', VSTUP_TEXTDOMAIN ),
		'id'            => 'footer',
		'description'   => '',
		'class'         => '',
	] ], get_theme_mod( 'register_asides', [] ) );
	foreach ( $asides as $aside ) {
		register_sidebar( array(
			'name'             => $aside[ 'name' ],
			'id'               => $aside[ 'id' ],
			'description'      => $aside[ 'description' ],
			'class'            => $aside[ 'class' ],
			'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-3"><div id="%1$s" class="widget %2$s">',
			'after_widget'     => '</div></div>',
			'before_title'     => '<h3 class="widget__title">',
			'after_title'      => '</h3>',
		) );
	}
}

add_action( 'widgets_init', 'vstup\register_sidebars' );