<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Выводит блок для "очистки потока"
 * @return    string    html код
 */
function get_clearfix_block() {
	$html = '';
	ob_start();
	include get_theme_file_path( 'views/clearfix.php' );
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}


add_shortcode( 'clearfix', 'vstup\get_clearfix_block' );
add_shortcode( strtoupper( 'clearfix' ), 'vstup\get_clearfix_block' );