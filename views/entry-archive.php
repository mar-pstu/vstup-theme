<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$thumbnail_url = '';

if ( has_post_thumbnail() ) {
	$thumbnail_url = get_the_post_thumbnail_url( null, 'thumbnail' );	
}

if ( empty( $thumbnail_url ) ) {
	$thumbnail_url = get_theme_file_uri( 'images/thumbnail.png' );
}


?>


<div <?php post_class( 'archive__entry entry', get_the_ID() ); ?> id="post-<?php the_ID(); ?>">
	<div class="row center-xs middle-xs">
		<div class="col-xs-12 col-sm-6 col-md-4">
			<a class="thumbnail" href="<?php the_permalink(); ?>">
				<img
					class="lazy wp-post-thumbnail"
					src="#"
					data-src="<?php echo $thumbnail_url; ?>"
					alt="<?php the_title_attribute(); ?>"
				/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-8">
			<div class="overlay">
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="excerpt"><?php the_excerpt(); ?></div>
				<p><a class="btn btn-sm btn-success" href="<?php the_permalink(); ?>"><?php _e( 'Подробнее', VSTUP_TEXTDOMAIN ); ?></a></p>
			</div>
		</div>
	</div>
</div>