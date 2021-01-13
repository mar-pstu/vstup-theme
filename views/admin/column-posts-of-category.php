<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $term_id ) && ! empty( $term_id ) ) : ?>

	<a href="/?TB_inline&width=600&height=550&inlineId=post-of-category-<?php echo esc_attr( $term_id ); ?>-modal" class="thickbox"><?php _e( 'Шорткод', VSTUP_TEXTDOMAIN ); ?></a>

	<div id="post-of-category-<?php echo esc_attr( $term_id ); ?>-modal" style="display:none;">
		<p>
			<input
				type="text"
				class="large-text code"
				readonly="readonly"
				onfocus="this.select();"
				value="[posts_of_category id=<?php echo esc_attr( $term_id ); ?> numberposts=-1 link=1 description=1 post_type=<?php echo esc_attr( get_current_screen()->post_type ) ?>]">
		</p>
		<ul>
			<li><code>id</code> - <?php _e( 'Идентификатор категории (обязательный параметр)', VSTUP_TEXTDOMAIN ); ?></li>
			<li><code>numberposts</code> - <?php _e( 'количество постов (по умолчанию все посты -1)', VSTUP_TEXTDOMAIN ); ?></li>
			<li><code>link</code> - <?php _e( 'ссылка внизу списка на страницу категории (по умолчанию 1)', VSTUP_TEXTDOMAIN ); ?></li>
			<li><code>description</code> - <?php _e( 'описание категории перед списком (по умолчанию 1)', VSTUP_TEXTDOMAIN ); ?></li>
			<li><code>post_type</code> - <?php _e( 'тип поста (по умолчанию post)', VSTUP_TEXTDOMAIN ); ?></li>
			<li><code>tag</code> - <?php _e( 'slug тега для дополнительной выборки (по умолчанию пуст)', VSTUP_TEXTDOMAIN ); ?></li>
			<li><code>tag_relation</code> - <?php _e( 'тип дополнительной выборки может быть AND или OR (по умолчанию OR)', VSTUP_TEXTDOMAIN ); ?></li>
		</ul>
	</div>

<?php endif; ?>