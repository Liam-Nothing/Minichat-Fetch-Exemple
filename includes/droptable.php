<?php

    $message = null;

    require("includes/db_connect.php");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	try {
    $pdo->query("use $dbname");

    $sql = $pdo->prepare("DROP DATABASE `{$dbname}`");
	
	
		if($sql->execute()){
			$message = "Database deleted";
		}else{
			print_r($sql->errorInfo()); 
		}
	} 
	catch (PDOException $e) {
		// $message = "Database doesnt exist.";
	}
?>
<p><?= $message ?></p>