<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function get_graduate_slider() {
	$result = '';
	ob_start();

	$graduates = get_theme_mod( 'graduates' );

	if ( is_array( $graduates ) && ! empty( $graduates ) ) {

		if ( file_exists( $init_script_path = get_theme_file_path( 'scripts/init/graduate-list.js' ) ) ) {
			wp_enqueue_style( 'slick' );
			wp_enqueue_scripts( 'slick' );
			wp_add_inline_script( 'slick', file_get_contents( $init_script_path ), 'after' );
		}
		
		include get_theme_file_path( 'views/graduate-list-before.php' );
		
		for ( $i = 0; $i < get_theme_mod( 'graduates_number' ); $i++ ) { 
			if (
				true
				&& isset( $graduates[ $i ] )
				&& is_array( $graduates[ $i ] )
				&& ! empty( $graduates[ $i ] )
				// && isset( $graduates[ $i ][ 'name' ] )
				// && ! empty( trim( $graduates[ $i ][ 'name' ] ) )
			) {
				extract( array_merge( array(
					'name'      => __( 'Выпускник', VSTUP_TEXTDOMAIN ),
					'excerpt'   => '',
					'foto'      => VSTUP_URL . 'images/user.svg',
					'specialty_title' => '',
					'specialty_permalink' => ( post_type_exists( 'educational_program' ) ) ? get_post_type_archive_link( 'educational_program' ) : '#',
					'specialty_thumbnail' => '',
				), $graduates[ $i ] ) );
				if ( filter_var( $foto, FILTER_VALIDATE_INT ) ) {
					$foto = wp_get_attachment_image_url( $foto, 'thumbnail', false );
				}
				if ( filter_var( $specialty_thumbnail, FILTER_VALIDATE_INT ) ) {
					$specialty_thumbnail = wp_get_attachment_image_url( $specialty_thumbnail, 'thumbnail', false );
				}
				if ( filter_var( $specialty_permalink, FILTER_SANITIZE_URL ) ) {
					$specialty_permalink = ( post_type_exists( 'educational_program' ) ) ? get_post_type_archive_link( 'educational_program' ) : '#';
				}
				include get_theme_file_path( 'views/graduate-list-item.php' );
			}
		}
		include get_theme_file_path( 'views/graduate-list-after.php' );
	}
	$result .= ob_get_contents();
	ob_clean();
	return $result;
}

add_shortcode( 'graduate_list', 'vstup\get_graduate_slider' );