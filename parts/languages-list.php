<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) ) {

	$current = pll_current_language( 'slug' );

	$other = pll_the_languages( array(
		'dropdown'           => 0,
		'show_names'         => '',
		'display_names_as'   => 'slug',
		'show_flags'         => 0,
		'hide_if_empty'      => 0,
		'force_home'         => 0,
		'echo'               => 0,
		'hide_if_no_translation' => 0,
		'hide_current'       => 0,
		'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
		'raw'                => 1,
	) );

	?>

		<ul class="languages list-inline">

	<?php

	if ( ( $other ) && ( ! empty( $other ) ) ) {
		
		foreach ( $other as $lang ) {

			printf(
				( $lang[ 'slug' ] == $current ) ? '<li class="current">%2$s</li>' : '<li><a href="%1$s">%2$s</a></li>',
				$lang[ 'url' ],
				$lang[ 'name' ]
			);

		}

	}

	?>

		</ul>

	<?php

}