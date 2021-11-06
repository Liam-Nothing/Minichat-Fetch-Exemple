<?php

	require("includes/config.php");

	// function getPdo(array $cfg):PDO {
	function getPdo($cfg) {
		global $dbname;
		$dbname =  $cfg["dbname"];
		return new PDO("mysql:host=".$cfg["host"], $cfg["dbusername"], $cfg["dbpassword"]);
	}

	$pdo = getPdo($config);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);