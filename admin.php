<?php
function cqr_admin_menu()
{
    add_menu_page(
        'Custom QR Code Generator',
        'QR Generator',
        'manage_options',
        'cqr-menu',
        'cqr_admin_page',
        plugin_dir_url(__FILE__) . "img/logo.png?1234",
        2
    );
}

add_action('admin_menu', 'cqr_admin_menu');

// Admin page content
function cqr_admin_page()
{
    if (isset($_GET['page'])) {
        require_once plugin_dir_path(__FILE__) . 'qr-generator.php';
    };
}
