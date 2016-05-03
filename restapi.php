<?php

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$resp = array();
$resp_mult = array();
$input = json_decode(file_get_contents('php://input'),true);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'admin', 'tech4dev');
mysqli_set_charset($link,'utf8');

if (isset($_GET['list_item']) && $_GET['list_item'] != '') {
    $id = $_GET['list_item'];
}
if (isset($input['list_item']) && $input['list_item']){
    $id = $input['list_item'];
}

if (isset($input['todo_name'])){
    $todo_name = $input['todo_name'];
}

// create SQL based on HTTP method
switch ($method) {
    case 'GET':
        if (isset($id) && $id != '') {
            $sql = "SELECT * FROM to_do WHERE todo_id='" .$id ."'";
        }else{
            $sql = "SELECT * FROM to_do";
        }
        $result = run_query($link, $sql);
        $numrows = mysqli_num_rows($result);
        if ($numrows === 1){
            $res = mysqli_fetch_assoc($result);
            $resp['todo_id'] = $res['todo_id'];
            $resp['todo_name'] = $res['todo_name'];
            echo json_encode($resp);
        }
        if ($numrows > 1){
            for ($i=0;$i<mysqli_num_rows($result);$i++) {
                $res = mysqli_fetch_assoc($result);
                $resp['todo_id'] = $res['todo_id'];
                $resp['todo_name'] = $res['todo_name'];
                array_push($resp_mult, $resp);
            }
            echo json_encode($resp_mult);
        }
        // die if SQL statement failed
        if (!$result) {
            http_response_code(404);
            die(mysqli_error($link));
        }
        break;
    case 'PUT':
        if (isset($id) && $id != '') {
            $sql = "UPDATE `to_do` SET `todo_name`='" . $todo_name . "' WHERE `todo_id`='" . $id . "'";
            $result = run_query($link, $sql);
            $resp['result'] = "update was successful!";
            echo json_encode($resp);
        }
        // die if SQL statement failed
        if (!$result) {
            http_response_code(404);
            die(mysqli_error($link));
        }
        break;
    case 'POST':
        $sql = "INSERT INTO `to_do` (`todo_name`) VALUES ('" .$todo_name . "')";
        $result = run_query($link, $sql);
        $resp['result'] = "insert was successful!";
        echo json_encode($resp);
        // die if SQL statement failed
        if (!$result) {
            http_response_code(404);
            die(mysqli_error($link));
        }
        break;
    case 'DELETE':
        $sql = "DELETE FROM `to_do` WHERE `todo_id`='" . $id . "'";
        $result = run_query($link, $sql);
        $resp['result'] = "delete was successful!";
        echo json_encode($resp);
        // die if SQL statement failed
        if (!$result) {
            http_response_code(404);
            die(mysqli_error($link));
        }
        break;
}

function run_query($link, $sql)
{
    $query = mysqli_query($link, $sql);
    return $query;
}

// close mysql connection
mysqli_close($link);