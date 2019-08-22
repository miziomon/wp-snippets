<?php

/*
  Plugin Name: Apogeo User Roles
  Plugin URI:
  Description: Creazione Ruoli e capabilites
  Author:
  Author URI:
  Version: 0.1
 */

$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$plugin_version = $plugin_data['Version'];

define( 'APOUR_VER', $plugin_version);
define( 'APOUR_PATH', dirname(__FILE__));
define( 'APOUR_URL', plugin_dir_url(__FILE__));


function autoloader($class_name) {
    $class_path = APOUR_PATH . '/classes/' . $path = str_replace("_", "/", $class_name) . ".php";
    if (!strrpos($class_path, "WP") && (file_exists($class_path))) {
        @include $class_path;
    }
}

spl_autoload_register('autoloader');

register_activation_hook(__FILE__, array( 'UserRole', 'install'));
register_deactivation_hook( __FILE__,  array( 'UserRole', 'remove'));
        
        
        