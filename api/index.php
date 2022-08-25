<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}

session_start();

require_once("includes/functs_db.php");
require_once("includes/functs_utils.php");

header('Content-Type: application/json');
$data_from_client = (array) json_decode(stripslashes(file_get_contents("php://input")));
$database = connectDB("minichat", $config);

if (count($data_from_client) > 0) {
    require_once("includes/selector_api.php");
} elseif (isset($_GET["api"])) {
    $data_from_client = $_GET;
    require_once("includes/selector_api.php");
} else {
    $return_data["type"] = "error";
    $return_data["message"] = "Empty client data";
}

echo json_encode($return_data);
