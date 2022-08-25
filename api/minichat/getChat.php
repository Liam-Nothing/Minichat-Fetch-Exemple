<?php

$sqlr = $database->prepare("SELECT * FROM `data` ORDER BY id DESC LIMIT 0,10");
$sqlr->execute();
$sqlr_rows = $sqlr->fetchAll(PDO::FETCH_ASSOC);

if (!empty($sqlr_rows)) {
    foreach($sqlr_rows as &$row) {
        $row = str_replace(":)", "<img class='moji' src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Twemoji_1f600.svg/1200px-Twemoji_1f600.svg.png'/>", $row);
        $row = str_replace(":nothingelse:", "<img class='moji' src='https://nothingelse.fr/img/logo_black.png'/>", $row);
    }

    $return_data["type"] = "success";
    $return_data["message"] = "OK";
    $return_data["content"] = $sqlr_rows;

}else{
    $return_data["type"] = "error";
    $return_data["message"] = "No messages";
}