<?php
/*
Plugin Name: ACF Hide Field Label setting
Plugin URI: https://github.com/davidofug/acf-hide-field-label
Description: The plugin adds a hide setting to the ACF field settings
Version: 1.0.1
Author: David of UG
Author URI: https://david.ug
Text Domain: acf-hide-fied-label
Domain Path: /lang
License: GPL
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('ACF_HIDE_FIELD_LABEL_SETTING_FILE', __FILE__);
define('ACF_HIDE_FIELD_LABEL_SETTING_DIR', __DIR__);
define('ACF_HIDE_LABEL_SETTING_PLUGIN_NAME','ACF hide field label');
define('PLUGIND_VERSION','1.0.1');
define('ACF_REQUIRED_VERSION','4');
define('PHP_REQUIRED_VERSION','5');
define('WP_REQUIRED_VERSION','4.5');

if(is_admin()) :

	function php_version_notice() {
	?>
		<div class="notice notice-error is-dismissible">
			<p><?php _e( 'This plugin requires PHP 5.4+. Your PHP Version: '.phpversion(), 'acf-hide-field-label' ); ?></p>
		</div>
	<?php	
    }
    
	function wp_version_notice() {
	?>
		<div class="notice notice-error is-dismissible">
			<p><?php _e( 'This plugin requires WordPress version 4.5+ '.phpversion(), 'acf-hide-field-label' ); ?></p>
		</div>
	<?php	
    }
    
	function acf_not_installed_notice() {
	?>
		<div class="notice notice-error is-dismissible">
			<p><?php _e( ACF_HIDE_LABEL_SETTING_PLUGIN_NAME.' plugin requires the ACF Plugin.', 'acf-hide-field-label' ); ?></p>
		</div>
	<?php
	}

	if ( !version_compare( phpversion(), PHP_REQUIRED_VERSION, '>=' ) ) {
		if( function_exists( 'php_version_notice') ) add_action( 'admin_notices', 'php_version_notice' );
	}else{

		if ( ! in_array( 'advanced-custom-fields-pro/acf.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			if( function_exists( 'acf_not_installed_notice') ) add_action( 'admin_notices', 'acf_not_installed_notice' );

		}else{
			require_once ACF_HIDE_FIELD_LABE_LSETTING_DIR.'/inc/hide-label.php';
		}

	}

endif;