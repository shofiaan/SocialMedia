<?php
	$user = 'root';
	$password = '';
	$server = 'localhost';
	$database = 'socialize';
	$pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);
?>
