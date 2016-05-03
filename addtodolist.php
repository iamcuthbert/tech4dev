<?php

$resp = array();

if (isset($_GET['todo_name']) && $_GET['todo_name']) {
    $todo_name = $_GET['todo_name'];
    $data = array('todo_name' => $todo_name);
    $data_json = json_encode($data);
    $url = "http://localhost/tech4dev/restapi.php" ;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    if (isset($response) && $response != '') {
        $resp['status'] = "OK";
        echo json_encode($resp);
    }else{
        $resp['status'] = "Error";
        $resp['msg'] = "Item not found";
        echo json_encode($resp);
    }
}else{
    $resp['status'] = "Error";
    $resp['msg'] = "No parameters set!";
    echo json_encode($resp);
}

?>
