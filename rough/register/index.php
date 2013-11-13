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

//Check if addform has been submitted
if (isset($_GET['addform'])) {

	//check password validity
	$password = md5($_POST['password']);
	$confirmPassword = md5($_POST['confirmPassword']);

	if ($password == $confirmPassword) {

		$pw_exp = '/^(?=.*\d).{4,32}$/';

		if(!preg_match($pw_exp,$password)) {
		    $errorMessage = 'Password must be between 4 and 32 digits long and include at least one numeric digit.<br />';
		    $panelTitle = 'Create Profile';
			$action = 'addform';
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
	}
	else {
		$errorMessage = 'Whoops! Looks like your passwords don\'t match';
		$panelTitle = 'Create Profile';
		$action = 'addform';
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
	}//end password validation check

	//make database connection
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';

	//check to see if email address is already registered
	try {	
		$sql = 'SELECT * FROM person WHERE 
			email = :email';
		$s = $pdo->prepare($sql);
		$s->bindValue(':email', $_POST['email']);
		$s->execute();
	} catch (PDOException $e) {
		$error = 'Error adding user' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
		exit();
	}

	//store results from successful person query in $row
	$row = $s->fetch();

	//check for results in row, if so; user already exists
	if (!empty($row)) {
		$errorMessage = 'Whoops! Look Like you\'re already registered.';
		$panelTitle = 'Create Profile';
		$action = 'addform';
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
	}//end existing check
	
	try {
		$sql = 'INSERT INTO person SET
			studentid = :studentid,
			firstname = :firstname,
			lastname = :lastname,
			address1 = :address1,
			address2 = :address2,
			zip = :zip,
			email = :email,
			password = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':studentid', $_POST['studentid']);
		$s->bindValue(':firstname', $_POST['firstname']);
		$s->bindValue(':lastname', $_POST['lastname']);
		$s->bindValue(':address1', $_POST['address1']);
		$s->bindValue(':address2', $_POST['address2']);
		$s->bindValue(':zip', $_POST['zip']);
		$s->bindValue(':email', $_POST['email']);
		$s->bindValue(':password', md5($_POST['password']));
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error adding user' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
		exit();
	}
	
	//Submit back to login index
	$_SESSION['message'] = 'Your profile has been created. If you would like to edit your profile, please log in.';
	header('Location: /VCP279/rough/');
	exit();
}
$panelTitle = 'Create Profile';
$action = 'addform';
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