<?php

$data = array(
    ["message", 500, 1],
    ["username", 30, 1]
);
$data = data_security($data_from_client, $data);

if (empty($data["type"]) or $data["type"] != "error") {
    $stmt = $database->prepare("INSERT INTO data (username, message, ip) VALUES (:username, :message, :ip)");
    $stmt->bindParam(':username', $data["username"]);
    $stmt->bindParam(':message', $data["message"]);
    $stmt->bindValue(':ip', getUserIP());
    $stmt->execute();

    $return_data["type"] = "success";
    $return_data["message"] = "OK";
} else {
    $return_data["type"] = "error";
    $return_data["message"] = "Client data error";
    $return_data["data"] = $data;
}