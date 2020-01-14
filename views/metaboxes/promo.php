



<p>
	<label for="subpage_menu">
		<input type="checkbox" id="subpage_menu" name="subpage_menu" value="on" <?php checked( $subpage_menu, true, true ); ?> >
		<?php _e( 'Показывать меню дочерних страниц', VSTUP_TEXTDOMAIN ); ?>
	</label>
</p>

<label for="page_nav_menu">
	<?php _e( 'Выбор дополнительного меню', VSTUP_TEXTDOMAIN ); ?>
</label>
<?php if ( is_array( $nav_menus ) && ! empty( $nav_menus ) ) : ?>
	<select name="page_nav_menu" id="page_nav_menu" style="display: block; width: 100%; box-sizing: border-box;">
		<option value="">-</option>
		<?php foreach ( $nav_menus as $menu ) : ?>
			<option value="<?php echo $menu->term_id ?>" <?php selected( $current_nav_menu, $menu->term_id, true ); ?> ><?php echo $menu->name; ?></option>
		<?php endforeach; ?>
	</select>
<?php else : ?>
	<?php _e( 'Ни одного меню не зарегистрировано', VSTUP_TEXTDOMAIN ); ?>
<?php endif; ?>