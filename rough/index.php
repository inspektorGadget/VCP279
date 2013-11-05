<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';

if (isset($_SESSION['logged'])) {

	$pageTitle = 'VCP Rental Admin';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
}
elseif (isset($_POST['userName'])) {
	$user = $_POST['userName'];
	$password = md5($_POST['password']);
	
	//connect to database
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	//get user data from databas
	try {
		$sql = 'SELECT id, firstname, lastname, email, type, status, password FROM person WHERE email = :email && password = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':email', $user);
		$s->bindValue(':password', $password);
		$s->execute();
	}
	catch(PDOException $e) {
		$_SESSION['error'] = 'Unable to connect to the database server. Bad username or password.';
		header('Location: /VCP279/rough/');
		exit();
	}
	
	//store result from successful person query in $row
	$row = $s->fetch();
	
	//check for results if so, bad user/pw
	if (empty($row)) {
  	$_SESSION['error'] = 'Unable to connect to the database server. Bad username or password.';
  	header('Location: /VCP279/rough/');
		exit();
	}
	
	//check to see if active admin user. if so, load rental database frontend
	if ($row['type'] == 'Admin' && $row['status'] == 'active') {
		//connect
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
		//set session data on successful authorization
		$_SESSION['user'] = $row['firstname'];
		$_SESSION['logged'] = 'edit';
		//build page
		$pageTitle = 'VCP Rental Admin';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	}
	//check to see if active frontend user. if so, load rental database frontend
	elseif ($row['type'] == 'Frontend' && $row['status'] == 'active') {
		//connect
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
		//set session data on successful authorization
		$_SESSION['user'] = $row['firstname'];
		$_SESSION['logged'] = 'edit';
		//build page
		$pageTitle = 'VCP Rental Admin';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	}
	else {
		$_SESSION['error'] = "You must be an administrator to enter the rental application";
		header('Location: /VCP279/rough/');
		exit();
	}
} 
else {
	$pageTitle = "User Login";
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/loginForm.html.php';
}
