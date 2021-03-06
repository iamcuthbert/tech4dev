<?php

$resp = array();

if ($_GET['list_item']) {
    $list_item = $_GET['list_item'];
    $data = array('list_item' => $list_item);
    $data_json = json_encode($data);
    $url = "http://localhost/tech4dev/restapi.php";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);
    if (isset($result) && $result != '') {
        $resp['status'] = "OK";
        echo json_encode($resp);
    }else{
        $resp['status'] = "Error";
        $resp['msg'] = "Item not found";
        echo json_encode($resp);
    }
    return $result;
}else{
    $resp['status'] = "Error";
    $resp['msg'] = "No parameters set!";
    echo json_encode($resp);
}
?>