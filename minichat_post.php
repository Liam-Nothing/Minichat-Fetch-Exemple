<?php

    require_once("includes/db_connect.php");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->query("use $dbname");

    if (isset($_POST["username"]) and isset($_POST["message"]) and !empty($_POST["username"])) {
        $username = htmlspecialchars($_POST["username"]);
        $message = htmlspecialchars($_POST["message"]);

        $stmt = $pdo->prepare("INSERT INTO data (username, message) VALUES (:username, :message)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        header('Location: index.php?p='.$username);
    }else{
        echo "Error";
    }