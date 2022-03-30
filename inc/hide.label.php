<?php

namespace Inc\Classes;

class Label {

	public function __construct() {

		add_action( 'acf/render_field_settings', array( $this, 'renderFieldSettings' ) );
		add_filter( 'acf/prepare_field', array( $this, 'prepareField' ) );

	}

	public function renderFieldSettings( $field ) {
		acf_render_field_setting(
			$field,
			array(
				'aria-label'   => __( 'Hide Label?', 'acf-hide-field-label' ),
				'label'        => __( 'Hide Label?', 'acf-hide-field-label' ),
				'instructions' => __( 'Allows you to hide field Label.', 'acf-hide-field-label' ),
				'name'         => 'hide_label',
				'type'         => 'true_false',
				'ui'           => 1,
			),
			true
		);
	}

	/*
	public function prepareField( $field ) {
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

		if ( ! empty( $field['hide_label'] ) ) : ?>

			<style type="text/css">
				.acf-field-<?php echo substr( $field['key'], 6 ); ?> > .acf-label {
					border: 0;
					clip: rect(0 0 0 0);
					height: 1px;
					margin: -1px;
					overflow: hidden;
					padding: 0;
					position: absolute;
					width: 1px;
				}
			</style>
			<?php

		endif;

		return $field;
	}
}

new Label();
