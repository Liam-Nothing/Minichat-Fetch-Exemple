<?php

	$message = null;

	require_once("includes/db_connect.php");
	include_once('includes/droptable.php');

	$dbname = "`".str_replace("`","``",$dbname)."`";
	$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
	$pdo->query("use $dbname");
	$pdo->query("CREATE TABLE $dbname.data ( `id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `message` VARCHAR(500) NOT NULL , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `ip` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ");

	$message = "Database created";

	?>
	<p><?= $message ?></p>