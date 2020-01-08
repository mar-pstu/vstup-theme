<?php



namespace vstup;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_custom_logo_img() {
	$result = __return_empty_string();
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$result = sprintf(
			'<img class="custom-logo" src="%1$s" alt="%2$s">',
			wp_get_attachment_image_url( $custom_logo_id, 'thumbnail', false ),
			get_bloginfo( 'name', 'display' )
		);
	}
	return $result;
}



function get_custom_logo_src( $size = 'full' ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	return ( $custom_logo_id ) ? wp_get_attachment_image_url( $custom_logo_id, $size, false ) : __return_empty_string();
}



function get_languages_list( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'container_class' => 'languages',
	) );
	$result = __return_empty_array();
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
		if ( ( $other ) && ( ! empty( $other ) ) ) {
			foreach ( $other as $lang ) $result[] = sprintf(
				( $lang[ 'slug' ] == $current ) ? '<li class="current">%2$s</li>' : '<li><a href="%1$s">%2$s</a></li>',
				$lang[ 'url' ],
				$lang[ 'name' ]
			);
		}
	}
	return ( empty( $result ) ) ? __return_empty_string() :  sprintf( '<ul class="%1$s">%2$s</ul>', $args[ 'container_class' ], implode( "\r\n", $result ) );
}



function the_advantages_list( $args = array() ) {
	echo get_languages_list( $args );
}



function render_links_list( $list, $class_name ) {
	$result = __return_empty_array();
	if ( is_array( $list ) && ! empty( $list ) ) {
		foreach ( $list as $key => $value ) {
			if ( ! empty( $value ) ) {
				$result[] = sprintf(
					'<li><a href="%1$s">%1$s</a></li>',
					$link,
					$name
				);
			}
		}
	}
	return ( empty( $result ) ) ? '' : sprintf( '<ul class="%1$s">%2$s</ul>', $class_name, implode( "\r\n", $result ) );
}




function the_breadcrumb() {
	ob_start();
	if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb();
	} else {
			if ( ! is_front_page() ) {
				echo '<a href="';
				echo home_url();
				echo '">'.__( 'Главная', VSTUP_TEXTDOMAIN );
				echo "</a> » ";
				if ( is_category() || is_single() ) {
						the_category(' ');
						if ( is_single() ) {
								echo " » ";
								the_title();
						}
				} elseif ( is_page() ) {
						echo the_title();
				}
			}
			else {
				echo __( 'Домашняя страница', VSTUP_TEXTDOMAIN );
			}
	}
	$result = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $result ) ) {
		echo '<div id="breadcrumbs" class="breadcrumbs">';
		echo $result;
		echo '</div>';
	}
}





function get_translate_id( $id, $type = 'post' ) {
	$result = '';
	if ( $id && ! empty( $id ) ) {
		if ( defined( 'POLYLANG_FILE' ) ) {
			switch ( $type ) {
				case 'category':
					$translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
				case 'post':
				case 'page':
				default:
					$translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
			} // switch
			$result = ( $translate ) ? $translate : '';
		} else {
			$result = $id;
		}
	}
	return $result;
}







function the_pager() {
	ob_start();
	foreach ( array(
		'previous'  => array(
			'entry'     => get_previous_post(),
			'label'     => __( 'Смотреть предыдущий пост', VSTUP_TEXTDOMAIN ),
		),
		'next'      => array(
			'entry'     => get_next_post(),
			'label'     => __( 'Смотреть следующий пост', VSTUP_TEXTDOMAIN ),
		),
	) as $key => $value ) {
		if ( $value[ 'entry' ] && ! is_wp_error( $value[ 'entry' ] ) ) {
			$title = apply_filters( 'the_title', $value[ 'entry' ]->post_title, $value[ 'entry' ]->ID );
			$label = $value[ 'label' ];
			$permalink = get_permalink( $value[ 'entry' ]->ID );
			include get_theme_file_path( 'views/adjacent-post.php' );
		}
	}
	$content = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $content ) ) {
			echo '<nav class="pager">' . $content . '</nav>';
	}
}







function the_thumbnail_image( $post_id, $size = 'thumbnail', $attribute = 'src' ) {
	printf(
		'<img class="lazy wp-post-thumbnail" src="#" data-%3$s="%1$s" alt="%2$s"/>',
		( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, $size ) : VSTUP_URL . 'images/thumbnail.png',
		the_title_attribute( array(
			'before' => '',
			'after'  => '',
			'echo'   => false,
			'post'   => $post_id,
		) ),
		$attribute
	);
}






function get_categories_choices() {
	$result = __return_empty_array();
	$categories = get_categories( array(
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	) );
	if ( is_array( $categories ) && ! empty( $categories ) ) {
		foreach ( $categories as $category ) {
			$result[ $category->term_id ] = esc_html( apply_filters( 'single_cat_title', $category->name ) );
		}
	}
	return $result;
}




function get_services_list() {
	$result = __return_empty_array();
	$services = get_theme_mod( VSTUP_SLUG . '_services_items', array() );
	if ( is_array( $services ) && ! empty( $services ) ) {
		for ( $i=0;  $i<get_theme_mod( VSTUP_SLUG . '_services_items_number', 6 );  $i++ ) { 
			if ( isset( $services[ $i ] ) ) {
				$service = array_merge( array(
					'title'     => '',
					'permalink' => '',
					'thumbnail' => '',
				), ( array ) $services[ $i ] );
				if ( ! empty( trim( $service[ 'title' ] ) ) ) {
					$result[] = sprintf(
						'<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2"><%1$s class="flatitem lazy" href="%2$s" data-src="%3$s"><div class="title">%4$s</div></%1$s></div>',
						( empty( trim( $service[ 'permalink' ] ) ) ) ? 'div' : 'a',
						esc_attr( $service[ 'permalink' ] ),
						esc_attr( $service[ 'thumbnail' ] ),
						$service[ 'title' ]
					);
				}
			}
		}
	}
	return ( empty( $result ) ) ? __return_empty_string() : '<div class="row">' . implode( "\r\n", $result ) . '</div>';
}



function the_services_list() {
	echo get_services_list();
}