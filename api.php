<?php
    header('Content-Type: application/json; charset=utf-8');
	require_once("includes/db_connect.php");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->query("use $dbname");

	$sth = $pdo->prepare("SELECT * FROM `data` ORDER BY id DESC LIMIT 0,10");
    $sth->execute();
    $rows = $sth->fetchAll();
    $myObj = [];

    if (!empty($rows)) {
        foreach($rows as $row) {
			$text = "<p>".$row["time"]." - ".$row["username"].": ".$row["message"]."</p>";
			$text = str_replace(":)", "<img class='moji' src='https://dbdzm869oupei.cloudfront.net/img/sticker/preview/20084.png'/>", $text);
			$text = str_replace(":nothingelse:", "<img class='moji' src='https://nothingelse.fr/img/logo_black.png'/>", $text);
            array_push($myObj, $text);
            // echo $text;
        }
        echo json_encode($myObj);
    }