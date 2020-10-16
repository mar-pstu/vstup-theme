<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function edit_category_custom_asides( $term ) {
	$custom_asides = get_term_meta( $term->term_id, '_custom_asides', true );
	$register_asides = get_theme_mod( 'register_asides', [] );
	?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="custom_asides"><?php _e( 'Выбрать сайдбар', VSTUP_TEXTDOMAIN ); ?></label>
			</th>
			<td>
				<select class="vstup-control" id="custom_asides" name="custom_asides">
					<option value=""><?php _e( 'Стандартный сайдбар', VSTUP_TEXTDOMAIN ); ?></option>
					<?php foreach ( $register_asides as $aside ) : ?>
						<option value="<?php echo $aside[ 'id' ]; ?>" <?php selected( $custom_asides, $aside[ 'id' ], true ); ?> ><?php echo $aside[ 'name' ]; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'vstup\edit_category_custom_asides' );


function add_category_custom_asides( $taxonomy_slug ) {
	$register_asides = get_theme_mod( 'register_asides', [] );
	?>
		<div class="form-field">
			<label for="custom_asides"><?php _e( 'Выбрать сайдбар', VSTUP_TEXTDOMAIN ); ?></label>
			<select class="vstup-control" id="custom_asides" name="custom_asides">
				<option value=""><?php _e( 'Стандартный сайдбар', VSTUP_TEXTDOMAIN ); ?></option>
				<?php foreach ( $register_asides as $aside ) : ?>
					<option value="<?php echo $aside[ 'id' ]; ?>" ><?php echo $aside[ 'name' ]; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php
}
add_action( 'category_add_form_fields', 'vstup\add_category_custom_asides' );


function save_category_custom_asides( $term_id ) {
	if ( ! current_user_can( 'edit_term', $term_id ) ) return;
	if (
		( isset( $_POST[ '_wpnonce' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce' ], "update-tag_$term_id" ) ) ||
		( isset( $_POST[ '_wpnonce_add-tag' ] ) && ! wp_verify_nonce( $_POST[ '_wpnonce_add-tag' ], "add-tag" ) )
	) return;
	$custom_asides = ( isset( $_POST[ 'custom_asides' ] ) ) ? sanitize_text_field( wp_unslash( $_POST[ 'custom_asides' ] ) ) : '';
	if ( empty( $custom_asides ) ) {
		delete_term_meta( $term_id, '_custom_asides' );
	} else {
		update_term_meta( $term_id, '_custom_asides', $custom_asides );
	}
	return $term_id;
}
add_action( 'create_category', 'vstup\save_category_custom_asides' );
add_action( 'edited_category', 'vstup\save_category_custom_asides' );




function add_custom_asides_meta_box() {
	if ( ! in_array( get_post_meta( get_the_ID(), '_wp_page_template', true ), array( 'singular-fluid.php' ) ) ) {
		add_meta_box(
			VSTUP_SLUG . '_custom_asides',
			__( 'Пользовательские сайдбары', VSTUP_TEXTDOMAIN ),
			'vstup\render_custom_asides_meta_box',
			array( 'page' ),
			'side'
		);
	}
}
add_action( 'add_meta_boxes', 'vstup\add_custom_asides_meta_box' );


function render_custom_asides_meta_box( $post, $meta ) {
	global $wp_registered_sidebars;
	wp_nonce_field( plugin_basename( __FILE__ ), 'custom_asides_noncename' );
	$custom_asides = get_post_meta( $post->ID, '_custom_asides', true );
	$register_asides = get_theme_mod( 'register_asides', [] );
	if ( ! empty( $register_asides ) ) : ?>
		<name class="vstup-name" for="custom_asides"><?php _e( 'Выбрать сайдбар', VSTUP_TEXTDOMAIN ); ?></name>
		<select class="vstup-control" id="custom_asides" name="custom_asides">
			<option value=""><?php _e( 'Стандартный сайдбар', VSTUP_TEXTDOMAIN ); ?></option>
			<?php foreach ( $register_asides as $aside ) : ?>
				<option value="<?php echo $aside[ 'id' ]; ?>" <?php selected( $custom_asides, $aside[ 'id' ], true ); ?> ><?php echo $aside[ 'name' ]; ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif;
}


function save_custom_asides_metadata( $post_id ) {
	if ( ! isset( $_POST[ 'custom_asides_noncename' ] ) ) return;
	if ( ! wp_verify_nonce( $_POST[ 'custom_asides_noncename' ], plugin_basename( __FILE__ ) ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	$custom_asides = sanitize_text_field( $_POST[ 'custom_asides' ] );
	if ( empty( $custom_asides ) ) {
		delete_post_meta( $post_id, '_custom_asides' );
	} else {
		update_post_meta( $post_id, '_custom_asides', $custom_asides );
	}
}
add_action( 'save_post', 'vstup\save_custom_asides_metadata' );


function register_custom_asides_submenu() {
	add_theme_page(
		__( 'Пользовательские сайдбары', VSTUP_TEXTDOMAIN ),
		__( 'Пользовательские сайдбары', VSTUP_TEXTDOMAIN ),
		'manage_options',
		VSTUP_SLUG . '_custom_asides',
		'vstup\render_custom_asides_submenu'
	);
}
add_action( 'admin_menu', 'vstup\register_custom_asides_submenu' );


function action_for_custom_asides( $current_screen ) {
	if ( 'appearance_page_' . VSTUP_SLUG . '_custom_asides' == $current_screen->id ) {
		if (
			current_user_can( 'manage_options' )
			 && isset( $_REQUEST[ 'action' ] )
			 && in_array( $_REQUEST[ 'action' ], [ 'add', 'edit', 'delete' ] )
			 && isset( $_REQUEST[ 'nonce' ] )
			 && wp_verify_nonce( $_REQUEST[ 'nonce' ], plugin_basename( __FILE__ ) )
		) {
			$register_asides = get_theme_mod( 'register_asides', [] );
			switch ( $_REQUEST[ 'action' ] ) {

				case 'add':
					if ( isset( $_REQUEST[ 'new_aside' ] ) ) {
						$new_aside = parse_only_allowed_args(
							[ 'name' => '', 'description' => '', 'class' => '' ],
							$_REQUEST[ 'new_aside' ],
							[ 'sanitize_text_field', 'sanitize_text_field', 'sanitize_text_field' ],
							[ 'name' ]
						);
						if ( null !== $new_aside ) {
							$new_aside[ 'id' ] = 'aside_' . md5( $new_aside[ 'name' ] );
							if ( empty( count( wp_list_filter( $register_asides, [ 'id' => $new_aside[ 'id' ] ], 'AND' ) ) ) ) {
								$register_asides[] = $new_aside;
							}
						}
					}
					break;

				case 'edit':
					if ( isset( $_REQUEST[ 'new_value' ] ) ) {
						$new_value = parse_only_allowed_args(
							[ 'name' => '', 'id' => '', 'description' => '', 'class' => '' ],
							$_REQUEST[ 'new_value' ],
							[ 'sanitize_text_field', 'sanitize_text_field', 'sanitize_text_field', 'sanitize_text_field' ],
							[ 'name', 'id', 'description', 'class' ]
						);
						if ( null !== $new_value ) {
							foreach ( $register_asides as &$register_aside ) {
								if ( $new_value[ 'id' ] == $register_aside[ 'id' ] ) {
									$register_aside = $new_value;
									break;
								}
							}
						}
					}
					break;

				case 'delete':
					if ( isset( $_REQUEST[ 'id' ] ) ) {
						$id = sanitize_text_field( $_REQUEST[ 'id' ] );
						if ( ! empty( $id ) ) {
							for ( $i = 0; $i < count( $register_asides ); $i++ ) { 
								if ( $id == $register_asides[ $i ][ 'id' ] ) {
									$pages = get_pages( [
										'number'     => -1,
										'meta_key'   => '_custom_asides',
										'meta_value' => $id,
									] );
									if ( is_array( $pages ) && ! empty( $pages ) ) {
										foreach ( $pages as $page ) {
											delete_post_meta( $page->ID, '_custom_asides' );
										}
									}
									array_splice( $register_asides, $i, 1 );
									break;
								}
							}
						}
					}
					break;

			}
			set_theme_mod( 'register_asides', $register_asides );
			wp_safe_redirect( get_admin_url( null, 'themes.php?page=' . VSTUP_SLUG . '_custom_asides', null ), 302 );
			exit();
		}
	}
}
add_action( 'current_screen', 'vstup\action_for_custom_asides', 10, 1 );




function render_custom_asides_submenu() {
	$current_tab = ( isset( $_REQUEST[ 'tab' ] ) && in_array( $_REQUEST[ 'tab' ], [ 'table', 'add', 'edit' ] ) ) ? $_REQUEST[ 'tab' ] : 'table';
	$register_asides = get_theme_mod( 'register_asides', [] );
	$nonce = wp_create_nonce( plugin_basename( __FILE__ ) );
	$page_url = 'themes.php?page=' . VSTUP_SLUG . '_custom_asides';
	$page_content = ( isset( $_REQUEST[ 'notice' ] ) ) ? $_REQUEST[ 'notice' ] : '';
	$page_title = get_admin_page_title();
	ob_start();
	if ( 'add' == $current_tab || empty( $register_asides ) ) : ?>
		<h3><?php _e( 'Добавление', VSTUP_TEXTDOMAIN ); ?></h3>
		<form method="post">
			<input type="hidden" name="nonce" required="required" value="<?php echo $nonce; ?>">
			<input type="hidden" name="action" required="required" value="add">
			<p>
				<input type="text" name="new_aside[name]" required="required" placeholder="<?php esc_attr_e( 'Название', VSTUP_TEXTDOMAIN ); ?>">
				<input type="text" name="new_aside[description]" placeholder="<?php esc_attr_e( 'Описание', VSTUP_TEXTDOMAIN ); ?>">
				<input type="text" name="new_aside[class]" placeholder="<?php esc_attr_e( 'CSS-класс', VSTUP_TEXTDOMAIN ); ?>">
				<button class="button button-primary" type="submit"><?php _e( 'Добавить', VSTUP_TEXTDOMAIN ); ?></button>
				<a class="button" href="<?php echo $page_url; ?>"><?php _e( 'Отмена', VSTUP_TEXTDOMAIN ); ?></a>
			</p>
		</form>
	<?php elseif ( 'edit' == $current_tab && isset( $_REQUEST[ 'id' ] ) ) : ?>
		<h3><?php _e( 'Редактирование', VSTUP_TEXTDOMAIN ); ?></h3>
		<?php
			$old_value = [ 'name' => '', 'id' => '', 'description' => '', 'class' => '' ];
			for ( $i = 0;  $i < count( $register_asides );  $i++ ) { 
				if ( $_REQUEST[ 'id' ] == $register_asides[ $i ][ 'id' ] ) {
					$old_value = $register_asides[ $i ];
					break;
				}
			}
		?>
		<form method="post">
			<p>
				<input type="hidden" name="nonce" required="required" value="<?php echo $nonce; ?>">
				<input type="hidden" name="action" required="required" value="edit">
				<input type="hidden" name="new_value[id]" required="required" value="<?php echo esc_attr( $old_value[ 'id' ] ); ?>">
				<input type="text" name="new_value[name]" required="required" value="<?php echo esc_attr( $old_value[ 'name' ] ); ?>" placeholder="<?php esc_attr_e( 'Название', VSTUP_TEXTDOMAIN ); ?>">
				<input type="text" name="new_value[description]" value="<?php echo esc_attr( $old_value[ 'description' ] ); ?>" placeholder="<?php esc_attr_e( 'Описание', VSTUP_TEXTDOMAIN ); ?>">
				<input type="text" name="new_value[class]" value="<?php echo esc_attr( $old_value[ 'class' ] ); ?>" placeholder="<?php esc_attr_e( 'CSS-класс', VSTUP_TEXTDOMAIN ); ?>">
			</p>
			<p>
				<a class="button" href="<?php echo $page_url; ?>"><?php _e( 'Отмена', VSTUP_TEXTDOMAIN ); ?></a>
				<button class="button button-primary" type="submit"><?php _e( 'Сохранить', VSTUP_TEXTDOMAIN ); ?></button>
			</p>
		</form>
	<?php else : ?>
		<?php
			add_thickbox();
			$count = 0;
			$page_title = $page_title . ' <a class="button button-primary" href="' . $page_url . '&tab=add">' . __( 'Добавить', VSTUP_TEXTDOMAIN ) . '</a>';
			$registered_sidebars = wp_get_sidebars_widgets();
		?>
		<table class="custom-aside-table">
			<thead>
				<th><?php _e( '№', VSTUP_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Название', VSTUP_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Описание', VSTUP_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'CSS-класс', VSTUP_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Страницы', VSTUP_TEXTDOMAIN ); ?></th>
				<th><?php _e( 'Виджеты', VSTUP_TEXTDOMAIN ); ?></th>
			</thead>
			<tbody>
				<?php foreach ( $register_asides as $register_aside ) : ?>
					<?php
						$count = $count + 1;
						$pages = get_pages( [
							'meta_key'    => '_custom_asides',
							'meta_value'  => $register_aside[ 'id' ],
							'sort_order'  => 'ASC',
							'sort_aside' => 'post_title'
						] );
						$categories = get_categories( [
							'taxonomy'    => 'category',
							'orderby'     => 'name',
							'order'       => 'ASC',
							'hide_empty'  => false,
							'fields'      => 'all',
							'meta_key'    => '_custom_asides',
							'meta_value'  => $register_aside[ 'id' ],
						] );
						$usage = 0;
						$widgets_count = ( array_key_exists( $register_aside[ 'id' ], $registered_sidebars ) ) ? count( $registered_sidebars[ $register_aside[ 'id' ] ] ) : 0;
						$action_url = $page_url . '&nonce=' . $nonce . '&id=' . $register_aside[ 'id' ];
					?>
					<tr>
						<td class="count"><?php echo $count; ?></td>
						<td class="name"><?php echo $register_aside[ 'name' ]; ?></td>
						<td class="description"><?php echo $register_aside[ 'description' ]; ?></td>
						<td class="class"><?php echo $register_aside[ 'class' ]; ?></td>
						<td class="posts">
							<div id="usage-<?php echo $register_aside[ 'id' ]; ?>" style="display:none;">
								<?php if ( is_array( $pages ) && ! empty( $pages ) ) : $usage = $usage + count( $pages ); ?>
									<h4><?php _e( 'Страницы', VSTUP_TEXTDOMAIN ); ?></h4>
									<ul class="list-disc">
										<?php foreach ( $pages as $page ) : ?>
											<li><a target="_blank" href="<?php echo get_permalink( $page ); ?>"><?php echo apply_filters( 'the_title', $page->post_title, $page->ID ); ?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<p><?php _e( 'Колонка не используется на постоянных страницах.', VSTUP_TEXTDOMAIN ); ?></p>
								<?php endif; ?>
								<?php if ( is_array( $categories ) && ! empty( $categories ) ) : $usage = $usage + count( $categories ); ?>
									<h4><?php _e( 'Категории', VSTUP_TEXTDOMAIN ); ?></h4>
									<ul class="list-disc">
										<?php foreach ( $categories as $category ) : ?>
											<li><a target="_blank" href="<?php echo get_category_link( $category ); ?>"><?php echo apply_filters( 'single_cat_title', $category->name ); ?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<p><?php _e( 'Колонка не используется на страницах категорий.', VSTUP_TEXTDOMAIN ); ?></p>
								<?php endif; ?>
							</div>
							<a class="thickbox" href="/?TB_inline&inlineId=usage-<?php echo $register_aside[ 'id' ]; ?>&width=300&height=200"><?php echo $usage; ?></a>
						</td>
						<td class="widgets"><?php echo $widgets_count; ?></td>
						<td class="text-right">
							<a class="action-button delete-button" onclick="return confirm( '<?php esc_attr_e( 'Вы уверены?', VSTUP_TEXTDOMAIN ); ?>' );" href="<?php echo $action_url . '&action=delete'; ?>"><?php _e( 'Удалить', VSTUP_TEXTDOMAIN ); ?></a>
							<a class="action-button edit-button" href="<?php echo $action_url . '&tab=edit'; ?>"><?php _e( 'Редактировать', VSTUP_TEXTDOMAIN ); ?></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif;
	$page_content = $page_content . ob_get_contents();
	ob_end_clean();
	include get_theme_file_path( 'views/admin/menu-page.php' );
}