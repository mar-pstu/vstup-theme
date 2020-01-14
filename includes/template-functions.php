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
		echo '<div class="breadcrumbs">';
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





function get_attachment_image( $attachment_id, $args = array() ) {
	$args = wp_parse_args( $args, array(
		'size'       => 'thumbnail',
		'attribute'  => 'src',
		'class_name' => 'wp-post-image',
		'alt'        => '',
	) );
	$result = __return_empty_string();
	$url = wp_get_attachment_image_url( $attachment_id, $args[ 'size' ], false );
	if ( $url ) {
		$result = sprintf(
			'<img class="lazy %1$s" src="#" data-%2$s="%3$s" alt="%4$s">',
			$args[ 'class_name' ],
			$args[ 'attribute' ],
			$url,
			( empty( trim( $args[ 'alt' ] ) ) ) ? trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ) : esc_attr( $args[ 'alt' ] )
		);
	}
	return $result;
}





function the_thumbnail_image( $post_id, $size = 'thumbnail', $attribute = 'src' ) {
	$attachment_id = get_post_thumbnail_id( $post_id );
	$alt = the_title_attribute( array(
		'before' => '',
		'after'  => '',
		'echo'   => false,
		'post'   => $post_id,
	) );
	if ( $attachment_id ) {
		echo get_attachment_image( $attachment_id, array(
			'size'       => $size,
			'attribute'  => $attribute,
			'alt'        => $alt,
		) );
	} else {
		printf(
			'<img class="lazy wp-post-thumbnail" src="#" data-%1$s="%2$s" alt="%3$s"/>',
			$attribute,
			VSTUP_URL . 'images/thumbnail.png',
			$alt
		);
	}
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
		for ( $i = 0;  $i < get_theme_mod( VSTUP_SLUG . '_services_items_number', 6 );  $i++ ) { 
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





function get_slider_arrow_buttons( $slug ) {
	$result = __return_empty_array();
	foreach ( array(
		'prev' => __( 'Предыдущий слайд', VSTUP_TEXTDOMAIN ),
		'next' => __( 'Следующий слайд', VSTUP_TEXTDOMAIN ),
	) as $key => $label ) {
		$result[] = sprintf(
			'<button class="slider-arrow arrow-%1$s" id="%2$s-arrow-next"><span class="sr-only">%2$s</span></button>',
			$key,
			$slug,
			$label
		);
	}
	return implode( "\r\n", $result );
}





function the_slider_arrow_buttons( $slug ) {
	echo get_slider_arrow_buttons( $slug );
}





function get_graduate_slider() {
	$result = __return_empty_string();
	$graduates = get_theme_mod( VSTUP_SLUG . '_graduates', __return_empty_array() );
	if ( is_array( $graduates ) && ! empty( $graduates ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( VSTUP_SLUG . '_graduates_number', 5 ); $i++ ) { 
			if ( isset( $graduates[ $i ] ) && is_array( $graduates[ $i ] ) && ! empty( $graduates[ $i ] ) && isset( $graduates[ $i ][ 'name' ] ) && ! empty( trim( $graduates[ $i ][ 'name' ] ) ) ) {
				extract( array_merge( array(
					'name'      => '',
					'excerpt'   => '',
					'foto'      => VSTUP_URL . 'images/user.svg',
					'specialty' => array(
						'title'      => '',
						'permalink'  => ( post_type_exists( 'educational_program' ) ) ? get_post_type_archive_link( 'educational_program' ) : '#',
						'thumbnail'  => '',
					),
				), $graduates[ $i ] ) );
				// if ( filter_var( $specialty[ 'thumbnail' ], FILTER_VALIDATE_URL ) ) {
				// 	$foto = wp_get_attachment_image_url( $foto, 'thumbnail', false );
				// }
				// if ( filter_var( $specialty[ 'thumbnail' ], FILTER_VALIDATE_URL ) ) {
				// 	$specialty[ 'thumbnail' ] = wp_get_attachment_image_url( $specialty[ 'thumbnail' ], 'thumbnail', false );
				// }
				include get_theme_file_path( 'views/graduate.php' );
			}
		}
		$slides = ob_get_contents();
		ob_clean();
		if ( ! empty( $slides ) ) {
			wp_enqueue_scripts( 'slick' );
			wp_enqueue_style( 'slick' );
			?>
				<div class="slider">
					<div id="graduate-list">
						<?php echo $slides; ?>
					</div>
					<?php the_slider_arrow_buttons( 'graduate' ); ?>
				</div>
				<script>
					( function () {
						jQuery( document ).ready( function () {
							jQuery( '#graduate-list' ).slick( {
								dots: true,
								arrows: true,
								fade: true,
								dotsClass: 'slider-dots',
								prevArrow: '#graduate-arrow-prev',
								nextArrow: '#graduate-arrow-next',
								autoplay: true,
								autoplaySpeed: 5000,
								speed: 1000,
								lazyLoad: 'ondemand',
								slidesToShow: 1,
								slidesToScroll: 1,
							} );
						} );
					} )();
				</script>
			<?php
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	return $result;
}









function get_specialties_slider( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'wrap'    => 1,
	) );
	$result = __return_empty_string();
	$terms = get_terms( array(
		'taxonomy'      => 'specialties',
		'orderby'       => 'name',
		'order'         => 'ASC',
		'hide_empty'    => true, 
		'number'        => '', 
		'fields'        => 'all', 
		'hierarchical'  => true, 
	) );
	if ( is_array( $terms ) && ! empty( $terms ) ) {
		$specialties = wp_list_filter( $terms, array( 'parent' => 0 ), 'NOT' );
		if ( ! empty( $specialties ) ) {
			$slides = __return_empty_array();
			wp_enqueue_scripts( 'slick' );
			wp_enqueue_style( 'slick' );
			foreach ( $specialties as $specialty ) {
				$parent = array_shift( wp_list_filter( $terms, array( 'parent' => $specialty->parent ), 'AND' ) );
				$attachment_id = get_term_meta( $parent->term_id, 'pstu_specialties_logo', true );
				$slides[] = sprintf(
					'<a class="specialties__item item" href="%1$s"><h3 class="title">%2$s</h3><div class="sector">%3$s</div><img class="thumbnail" src="#" data-lazy="%4$s" alt="%5$s"></a>',
					get_term_link( $specialty->term_id, 'specialties' ),
					wp_strip_all_tags( apply_filters( 'single_term_title', $specialty->name ) ),
					wp_strip_all_tags( apply_filters( 'single_term_title', $parent->name ) ),
					( empty( $attachment_id ) ) ? VSTUP_SLUG . 'images/sector.png' : wp_get_attachment_image_url( $attachment_id, 'thumbnail', false ),
					esc_attr( $specialty->name )
				);
			}
			if ( ! empty( $slides ) ) {
				?>
					<div class="slider">
						<div id="specialties-list">
							<?php echo implode( "\r\n", $slides ); ?>
						</div>
						<?php the_slider_arrow_buttons( 'specialties' ); ?>
					</div>
				<?php
			}
		}
	}
	return $result;
}







function get_share( $post_id = false ) {
	if ( $post_id ) { $post_id = get_the_ID(); }
	$format = __return_empty_string();
	$result = __return_empty_array();
	$title = __return_empty_string();
	$permalink = __return_empty_string();
	$thumbnail_url = VSTUP_URL . 'images/thumbnail.png';
	$blog_name = get_bloginfo( 'name' );
	if ( $post_id || is_singular() ) {
		$permalink = get_permalink( $post_id );
		$title = get_the_title( $post_id );
		$thumbnail_url = ( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, 'medium' ) : $thumbnail_url;
	} elseif ( is_front_page() ) {
		$permalink = get_home_url();
		$title = get_bloginfo( 'name' );
		$thumbnail_url = ( has_header_image() ) ? get_header_image() : $thumbnail_url;
	} elseif ( is_search() ) {
		$permalink = get_search_link( get_search_query() );
		$title = sprintf( __( 'Результаты поиска %s', VSTUP_TEXTDOMAIN ), get_search_query() );
	} elseif ( $term_id = get_queried_object()->term_id ) {
		$permalink = get_term_link( $term_id );
		$title = single_term_title( $term_id, 0 );
	}
	foreach ( array(
		'facebook' => __( 'Поделиться в Facebook', VSTUP_TEXTDOMAIN ),
		'twitter'  => __( 'Поделиться в Twitter', VSTUP_TEXTDOMAIN ),
		'linkedin' => __( 'Поделиться в LinkedIn', VSTUP_TEXTDOMAIN ),
		'email'    => __( 'Отправить по email', VSTUP_TEXTDOMAIN ),
	) as $key => $label ) {
		switch ( $key ) {
			case 'facebook':
				$format = 'https://www.facebook.com/sharer.php?u=%1$s&amp;t=%2$s';
				break;
			case 'twitter':
				$format = 'https://twitter.com/share?url=%1$s&amp;text=%2$s';
				break;
			case 'linkedin':
				$format = 'https://www.linkedin.com/shareArticle?mini=true&url=%1$s&title=%2$s';
				break;
			case 'email':
				$format = 'mailto:info@example.com?&subject=%4$s&body=%2$s %1$s';
				break;
		}
		$link = sprintf(
			$format,
			$permalink,
			esc_attr( $title ),
			$thumbnail_url,
			esc_attr( $blog_name )
		);
		$result[] = sprintf(
			'<li><a class="%1$s" target="_blank" href="%2$s"><span class="sr-only">%3$s</span></a></li>',
			$key,
			$link,
			$label
		);
	}
	return ( empty( $result ) ) ? '' : '<ul class="share">' . implode( "\r\n", $result ) . '</ul>';
}




function the_share( $post_id = false ) {
	echo get_share( $post_id );
}




function the_pageheader() {
	if ( is_archive() ) {
		$title = get_the_archive_title();
		$excerpt = do_shortcode( get_the_archive_description() );
		$thumbnail = __return_empty_string();
	} elseif ( is_search() ) {
		$title = __( 'Результаты поиска' );
		$excerpt = __return_empty_string();
		$thumbnail = __return_empty_string();
	} else {
		$title = single_post_title( '', false );
		$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;
		$thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
		$thumbnail = ( ( bool ) $thumbnail_id ) ? get_attachment_image( $thumbnail_id, array(
			'size'       => 'thumbnail',
			'attribute'  => 'src',
			'class_name' => 'thumbnail',
			'alt'        => '',
		) ) : __return_empty_string();
	}
	include get_theme_file_path( 'views/pageheader.php' );
}





function get_warning_nav_menu() {
	$result = __return_empty_array();
	$nav_menu_locations = get_nav_menu_locations();
	if ( $nav_menu_locations && isset( $nav_menu_locations[ 'warning' ] ) ) {
		$items = wp_get_nav_menu_items( $nav_menu_locations[ 'warning' ] );
			if ( is_array( $items ) && ! empty( $items ) ) {
				$items = wp_list_filter( $items, array( 'menu_item_parent' => 0 ), 'AND' );
				foreach ( $items as $item ) {
					$result[] = sprintf(
						'<li class="%1$s"><a href="%2$s" title="%3$s">%4$s</a></li>',
						implode( " ", $item->classes ),
						esc_attr( $item->url ),
						esc_attr( $item->description ),
						$item->title
					);
				}
			}
	}
	return ( empty( $result ) ) ? __return_empty_string() : '<ul class="warning list-inline small">' . implode( "\r\n", $result ) . '</ul>';
}



/**
 * Подсветка результатов поиска
 **/
function search_backlight( $text ) {
	if ( is_search() ) {
		$query_terms = get_query_var( 'search_terms' );
		if ( empty( $query_terms ) ) $query_terms = array( get_query_var( 's' ) );
		if ( empty( $query_terms ) ) return $text;
		foreach( $query_terms as $term ) {
			$term = preg_quote( $term, '/' );
			$text = preg_replace_callback( "/$term/iu", function( $match ) {
				return '<span class="bg-info">'. $match[ 0 ] .'</span>';
			}, $text );
		}
	}
	return $text;
}