<?php

    require("includes/db_connect.php");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->query("use $dbname");

    if (isset($_POST["username"]) and isset($_POST["message"]) and !empty($_POST["username"])) {
        $username = htmlspecialchars($_POST["username"]);
        $message = htmlspecialchars($_POST["message"]);

        $stmt = $pdo->prepare("INSERT INTO data (pseudo, message) VALUES (:pseudo, :message)");
        $stmt->bindParam(':pseudo', $username);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        header('Location: index.php?p='.$username);
    }else{
        echo "Error";
    }