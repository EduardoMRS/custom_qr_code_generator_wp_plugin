<?php
if (isset($_GET['cod_del'])) {
    require_once("../../wp-load.php");
    global $wpdb;

    $table_name = $wpdb->prefix . 'qr_generator';

    $result_delete = $wpdb->delete($table_name, array('id' => $_GET['cod_del']), array('%d'));

    echo "Tudo certo";
} else {
    echo "Ocorreu um erro!";
}
