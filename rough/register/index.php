<?php
session_start();
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'User Registration';

if (isset($_SESSION['logged'])) {
	//if user is logged in, set email from session
	$email = $_SESSION['email'];
	
	//connect to database
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	//Get user info from person table
	try {
		$sql = 'SELECT id, studentid, firstname, lastname, address1, address2, zip, email, type, status, password FROM person WHERE email = :email';
		$s = $pdo->prepare($sql);
		$s->bindValue(':email', $email);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error fetching user details' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

	//store result from person query in $row
	$row = $s->fetch();
	
	//Set variables for populated user form
	$panelTitle = 'Edit Profile';
	$action = 'editform';
	$studentid = $row['studentid'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
	$zip = $row['zip'];
	$email = $row['email'];
	$type = $row['type'];
	$status = $row['status'];
	$password = $row['password'];
	$id = $row['id'];
	$button = 'Update Profile';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'register_user.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}
else {
	//Set variables for new user form
	$panelTitle = 'Create Profile';
	$action = 'editform';
	$studentid = '';
	$firstname = '';
	$lastname = '';
	$address1 = '';
	$address2 = '';
	$zip = '';
	$email = '';
	$type = 'Student';
	$status = 'active';
	$id = '';
	$button = 'Create Profile';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'register_user.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}