<?php

$data = array(["api", 60, 1]);
$data = data_security($data_from_client, $data);

if (empty($data["type"]) or $data["type"] != "error") {
    switch ($data["api"]) {
        case "getChat":
            require_once(dirname(__FILE__) . "/../minichat/getChat.php");
            break;
        case "postMessage":
            require_once(dirname(__FILE__) . "/../minichat/postMessage.php");
            break;

        default:
            $return_data["type"] = "error";
            $return_data["message"] = "API doesnt exist";
    }
} else {
    $return_data["type"] = "error";
    $return_data["message"] = "Client data error";
}
