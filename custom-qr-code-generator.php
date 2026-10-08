<?php
/*
Plugin Name: Custom QR Code Generator
Description: Generate custom QR codes with various customization options.
Version: 1.0
Author: Eduardo Marcos R. da Silva
*/

// Define constant for plugin directory
define('CQR_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include necessary files
// require_once(CQR_PLUGIN_DIR . 'qr-generator.php');
require_once(CQR_PLUGIN_DIR . 'admin.php');

// Hook to activate and deactivate the plugin
register_activation_hook(__FILE__, 'cqr_activate');
register_deactivation_hook(__FILE__, 'cqr_deactivate');

// Activation hook function
function cqr_activate()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . 'qr_generator';

    $sql = "CREATE TABLE $table_name (
        `id` INT NOT NULL AUTO_INCREMENT,
        `logo` varchar(500) DEFAULT NULL,
        `value` varchar(500) DEFAULT NULL,
        `size` INT NOT NULL,
        `color_bk` varchar(45) DEFAULT NULL,
        `color_ft` varchar(45) DEFAULT NULL,
        PRIMARY KEY (`id`)
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Deactivation hook function
function cqr_deactivate()
{
    global $wpdb;
    $table_name =  $wpdb->prefix . 'qr_generator';

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
