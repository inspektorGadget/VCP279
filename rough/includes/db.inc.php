<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=vcp279', $_SESSION['user'], $_SESSION['password']);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch(PDOException $e) {
	session_destroy();
	$error = 'Unable to connect to the database server. Bad username or password';
	header('Location: /VCP279/rough/');
	exit();
}