
<?php
    if(!function_exists('acf_hide_label_render_field_settings')) :

        function switch_label_render_field_settings( $field ) {	
            acf_render_field_setting( $field, [
                'label'			=> __('Hide Label?','acf-hide-field-label'),
                'instructions'	=> __('Allows you to hide field Label.','acf-hide-field-label'),
                'name'			=> 'hide_label',
                'type'			=> 'true_false',
                'ui'			=> 1,
            ], true);	
        }
        add_action('acf/render_field_settings', 'acf_hide_label_render_field_settings');

    endif;

    if ( !function_exists('acf_hide_label_prepare_field') ) :
        
        function acf_hide_label_prepare_field( $field ) {
            if (isset($field['hide_label'])) :
                echo '
                <style type="text/css">
                    .acf-field-', substr($field['key'],6),' > .acf-label {display: none;}
                </style>';
            endif;

            return $field;
        }

        add_filter('acf/prepare_field', 'acf_hide_label_prepare_field');

    endif;