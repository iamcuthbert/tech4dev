<?php

$resp = array();
    $list_item = "";
    if (isset($_GET['list_item']) && $_GET['list_item'] == '') {
        $list_item = $_GET['list_item'];
    }
    $data = array('list_item' => $list_item);
    $data_json = json_encode($data);
    $url = "http://localhost/tech4dev/restapi.php?list_item=" . $list_item;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if (isset($response) && $response != '') {
        echo $response;
    }else{
        $resp['status'] = "Error";
        $resp['msg'] = "Item not found";
        echo json_encode($resp);
    }

?>
