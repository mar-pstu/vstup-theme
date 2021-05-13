<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'VSTUP_URL', get_template_directory_uri() . '/' );
define( 'VSTUP_DIR', get_template_directory() . '/' );
define( 'VSTUP_TEXTDOMAIN', 'pstu-vstup' );
define( 'VSTUP_SLUG', 'pstu_vstup' );


get_template_part( 'includes/textdomain' );
get_template_part( 'includes/theme-hooks' );
get_template_part( 'includes/theme-supports' );
get_template_part( 'includes/theme-functions' );
get_template_part( 'includes/gutenberg' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/sidebars' );
get_template_part( 'includes/image-sizes' );


get_template_part( 'shortcodes/graduate-list' );
get_template_part( 'shortcodes/advantages-list' );
get_template_part( 'shortcodes/services-list' );
get_template_part( 'shortcodes/accordio-list' );
get_template_part( 'shortcodes/clearfix' );
get_template_part( 'shortcodes/posts-of-category' );
get_template_part( 'shortcodes/tabs' );


if ( function_exists( 'pll_register_string' ) && function_exists( 'pll__' ) ) {
	get_template_part( 'includes/translate-setting' );
	get_template_part( 'includes/register-strings' );
}


if ( is_admin() && ! wp_doing_ajax() ) {
	get_template_part( 'includes/enqueue-admin' );
	get_template_part( 'includes/metabox-promo' );
	get_template_part( 'includes/custom-asides-admin' );
	get_template_part( 'includes/theme-activate' );
	new vstup\MetaboxPromo();
} else {
	get_template_part( 'includes/lazyload.php' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/custom-asides-public' );
	get_template_part( 'includes/search-result' );
}


if ( is_customize_preview() ) {
	get_template_part( 'settings/wp-customize-control-list' );
	get_template_part( 'includes/customizer-panels' );
	get_template_part( 'includes/sanitize-settings' );
	get_template_part( 'settings/header' );
	get_template_part( 'settings/partners' );
	get_template_part( 'settings/contacts' );
	get_template_part( 'settings/socials' );
	get_template_part( 'settings/firstscreen' );
	get_template_part( 'settings/about' );
	get_template_part( 'settings/news' );
	get_template_part( 'settings/action' );
	get_template_part( 'settings/faculties' );
	get_template_part( 'settings/videos' );
	get_template_part( 'settings/people' );
	get_template_part( 'settings/services' );
	get_template_part( 'settings/questions' );
}