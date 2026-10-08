<?php
require_once("../../wp-load.php");
global $wpdb;

$table_name = $wpdb->prefix . 'qr_generator';
$data = json_decode(file_get_contents('php://input'), true);

$result_select = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE value = %s", $data['value']));
if (empty($result_select)) {
    $insert_data = array(
        'value' => $data['value'],
        'name' => $data['name'],
        'size' => $data['size'],
        'color_bk' => $data['color_bk'],
        'color_ft' => $data["color_ft"],
        'dots_type' => $data['dots_type'],
        'corners_type' => $data['corners_type']
    );
    if ($wpdb->insert($table_name, $insert_data)) {
        // echo "insert Realizado";
    } else {
        // echo "erro no insert";
    }
} else {
    //Retorna o primeiro elemento
    $first_result = reset($result_select);

    $update_data = array(
        'value' => $data['value'],
        'name' => $data['name'],
        'size' => $data['size'],
        'color_bk' => $data['color_bk'],
        'color_ft' => $data["color_ft"],
        'dots_type' => $data['dots_type'],
        'corners_type' => $data['corners_type']
    );

    $update_data_where = array(
        'id' => $first_result->id
    );

    if ($wpdb->update($table_name, $update_data, $update_data_where)) {
        // echo "Update Realizado";
    } else {
        // echo "erro no update";
    }
}
