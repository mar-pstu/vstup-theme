<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( 'questions_title', __( 'Остались вопросы? Звони или пиши нам!', VSTUP_TEXTDOMAIN ) );
$bgi = get_theme_mod( 'questions_bgi' );

if ( isset( $bgi ) && ! empty( $bgi ) ) {
	$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $bgi ) );
	if ( $thumbnail_id && ! is_wp_error( $thumbnail_id ) ) {
		$bgi = wp_get_attachment_image_url( $thumbnail_id, ( wp_is_mobile() ) ? 'medium' : 'large', false );
	}
}

$form = get_theme_mod( 'questions_form', '' );
$permalink = get_theme_mod( 'questions_permalink' );
$label = get_theme_mod( 'questions_label' );


include get_theme_file_path( 'views/home/questions.php' );