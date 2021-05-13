<?php


namespace vstup;


if ( ! defined( 'ABSPATH' ) ) { exit; };


class WP_Customize_Control_Tinymce_Editor extends \WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $type = 'tinymce_editor';

	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {
		wp_enqueue_script(
			'wp-customize-control-tinymce-editor',
			get_theme_file_uri( 'scripts/wp-customize-control-tinymce-editor.js' ),
			[ 'jquery' ],
			filemtime( get_theme_file_path( 'scripts/wp-customize-control-tinymce-editor.js' ) ),
			true
		);
		wp_enqueue_script( 'jquery' );
		wp_enqueue_editor();
	}

	/**
	 * Pass our TinyMCE toolbar string to JavaScript
	 */
	public function to_json()
	{
		parent::to_json();
		$this->json['intinymcetoolbar1'] = isset($this->input_attrs['toolbar1']) ? esc_attr($this->input_attrs['toolbar1']) : 'bold italic bullist numlist alignleft aligncenter alignright link';
		$this->json['intinymcetoolbar2'] = isset($this->input_attrs['toolbar2']) ? esc_attr($this->input_attrs['toolbar2']) : '';
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content()
	{
		?>
		<div class="tinymce-control">
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<?php if (!empty($this->description)) { ?>
				<span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
			<?php } ?>
			<textarea rows="10" id="<?php echo esc_attr($this->id); ?>"
					  class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr($this->value()); ?></textarea>
		</div>
		<?php
	}
}