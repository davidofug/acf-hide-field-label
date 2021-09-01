<?php

Namespace Inc\Classes;

class Label {
	
	public function __construct() {
		
		add_action('acf/render_field_settings', [$this,'renderFieldSettings']);
    		add_filter('acf/prepare_field', [$this,'prepareField']);
		
	}

	public function renderFieldSettings( $field ) {
		acf_render_field_setting( $field, [
			'aria-label'	=> __('Hide Label?','acf-hide-field-label'),
			'label'		=> __('Hide Label?','acf-hide-field-label'),
			'instructions'	=> __('Allows you to hide field Label.','acf-hide-field-label'),
			'name'		=> 'hide_label',
			'type'		=> 'true_false',
			'ui'		=> 1,
		], true);	
	}

	/*public function prepareField( $field ) {
		if (@$field['hide_label']) :
		
			echo '
				<style type="text/css">
					.acf-field-', substr($field['key'],6),' > .acf-label {display: none;}
				</style>
				';
		endif;

		return $field;
	}*/
	
	public function prepareField( $field ) {
		if (@$field['hide_label']) : ?>
			<style type="text/css">
				.acf-field-<?= substr( $field['key'], 6); ?> > .acf-label {display: none;}
			</style>
		<?php endif;
		
		return $field;
	}
}

new Label();
