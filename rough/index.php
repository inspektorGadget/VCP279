<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'edit') {

	$pageTitle = 'VCP Rental Admin';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
}
elseif (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	//connect to database
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	//get user data from database
	try {
		$sql = 'SELECT id, firstname, lastname, email, type, status, password FROM person WHERE email = :email && password = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':email', $email);
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
	
	//check for results if not, bad user/pw
	if (empty($row)) {
  	$_SESSION['error'] = 'Bad username or password.';
  	header('Location: /VCP279/rough/');
		exit();
	}
	
	//if results, determine user type and action to take
	if ($row['type'] == 'Admin' || $row['type'] == 'Frontend') {
		if ($row['status'] == 'active') {
			//set session data and load main nav on successful admin authorization
			$_SESSION['logged'] = 'admin';
			$_SESSION['user'] = $row['firstname'];
			$_SESSION['email'] = $row['email'];
			//build page
			$pageTitle = 'VCP Rental Admin';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		}
		else {
			//if not active admin redirect user profile page
			$_SESSION['logged'] = 'nonAdmin';
			$_SESSION['user'] = $row['firstname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['message'] = 'If you would like to update your profile, please do so below.';
			header('Location: /VCP279/rough/register/');
		}
	}
	elseif ($row['type'] == 'Student') {
		//if Student redirect user profile page
			$_SESSION['logged'] = 'nonAdmin';
			$_SESSION['user'] = $row['firstname'];
			$_SESSION['email'] = $row['email'];
			header('Location: /VCP279/rough/register/');
	}
}//end check on $_POST['email] 
else {
	$pageTitle = "User Login";
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/loginForm.html.php';
}
