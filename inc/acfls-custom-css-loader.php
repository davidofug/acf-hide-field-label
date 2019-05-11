<?php
if( !function_exists('acfls_acf_admin_head_custom_styles')) : 
    function acfls_acf_admin_head_custom_styles() {

    }
    
    add_action('acf/input/admin_head', 'acfls_acf_admin_head_custom_styles');

endif;