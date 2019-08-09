<?php

header("Content-Type:application/json");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    if (\App\Campus::find($id) == null) {
        $this->response(400, "failed", null, null, null, null);
    } else {
        $campus = \App\Campus::find($id);
        $this->response(200, "success", $campus->name, $campus->abbreviation, $campus->address, $campus->phone);
    }
}

function response($status, $status_message, $name, $abbreviation, $address, $phone) {
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['name'] = $name;
    $response['abbreviation'] = $abbreviation;
    $response['address'] = $address;
    $response['phone'] = $phone;

    $json_response = json_encode($response);
    echo $json_response;
}
