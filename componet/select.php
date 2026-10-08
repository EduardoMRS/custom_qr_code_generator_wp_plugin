<?php
if (isset($_GET['cod'])) {
    require_once("../../wp-load.php");
    global $wpdb;

    $table_name = $wpdb->prefix . 'qr_generator';

    $result_select = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id = %s", $_GET['cod']));
    $first_result = reset($result_select);

    echo json_encode($first_result);
} else {
    echo "Ocorreu um erro!";
}
