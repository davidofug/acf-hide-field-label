
<?php
if(!function_exists('switch_label_render_field_settings')) :

    function switch_label_render_field_settings( $field ) {	
        acf_render_field_setting( $field, [
            'label'			=> __('Hide Label?'),
            'instructions'	=> 'If you don\'t want to show the label of the field.' ,
            'name'			=> 'hide_label',
            'type'			=> 'true_false',
            'ui'			=> 1,
        ], true);	
    }
    add_action('acf/render_field_settings', 'switch_label_render_field_settings');
endif;


if ( !function_exists('switch_label_prepare_field') ) :
    
    function switch_label_prepare_field( $field ) {
        if ($field['hide_label'])
            echo '
            <style type="text/css">
                .acf-field-', substr($field['key'],6),' > .acf-label {display: none;}
            </style>';
        return $field;
    }
    add_filter('acf/prepare_field', 'switch_label_prepare_field');

endif;




