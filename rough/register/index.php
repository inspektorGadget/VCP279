<?php
session_start();
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'User Registration';


//Check for change password
if (isset($_GET['changePassword'])) {

	//first check to see if user is logged in
	if (!isset($_SESSION['logged'])) {
		$errorMessage = 'Whoops! You need to log in to change your password. 
						<a href="/">Log In</a>';

		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'change_pw.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

	//if logged in, get user info
	$email = $_SESSION['email']; 

	//connect to database
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';

	try {
		$sql = 'SELECT id FROM person WHERE email = :email';
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
	//prepare results/variables for password form
	$id = $row['id'];
	$panelTitle = 'Change Password';
	$action = 'updatePassword';
	$button = 'change password';


	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'change_pw.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Password Reset
if (isset($_GET['updatePassword'])) {
	
	//first check to see if user is logged in
	if (!isset($_SESSION['logged'])) {
		$errorMessage = 'Whoops! You need to log in to change your password. 
						<a href="/">Log In</a>';

		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'change_pw.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

	//connect to database
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';

	try {
		$sql = 'SELECT password FROM person WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
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
	//prep variables for password change
	$currentPassword = $row['password'];
	$currentPasswordCheck = md5($_POST['currentPasswordCheck']);
	$newPassword = $_POST['newPassword'];
	$newPasswordVerify = $_POST['newPasswordVerify'];

	//password verification
	if ($currentPassword == $currentPasswordCheck) {
		
		$pw_exp = '/^(?=.*\d).{4,32}$/';

		if(!preg_match($pw_exp,$newPassword)) {
			$errorMessage = 'Password must be between 4 and 32 digits long and include at least one numeric digit.<br />';
		    $id = $_POST['id'];
			$panelTitle = 'Change Password';
			$action = 'updatePassword';
			$button = 'change password';


			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'change_pw.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
			exit();
  		}
  		elseif ($newPassword != $newPasswordVerify) {
  			$errorMessage = 'Whoops! Looks like the new passwords you entered don\'t match.<br />';
		    $id = $_POST['id'];
			$panelTitle = 'Change Password';
			$action = 'updatePassword';
			$button = 'change password';


			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'change_pw.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
			exit();
  		}//end password verification

  		//make database changes
		try {
			$sql = 'UPDATE person SET
				password = :password
				WHERE id = :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':password', md5($_POST['newPassword']));
			$s->bindValue(':id', $_POST['id']);
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error updating password' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}

		//After successful update, display success message and updated info
		try {
			$sql = 'SELECT id, studentid, firstname, lastname, address1, address2, zip, email, type, status FROM person WHERE id = :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':id', $_POST['id']);
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error updating user details' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
			exit();
		}

		//store result from person query in $row
		$row = $s->fetch();

		//Set variables for populated registration form
		$panelTitle = 'Edit Profile';
		$errorMessage = 'Password Updated Successfully';
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
		$id = $row['id'];
		$button = 'Update User';
		
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'register_user.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	else {
		$errorMessage = 'Whoops! Looks like you entered the wrong password.<br />';
	    $id = $_POST['id'];
		$panelTitle = 'Change Password';
		$action = 'updatePassword';
		$button = 'change password';


		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'change_pw.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
}

//if user is logged in display user's info also account for logged in user moving back to edit profile
if (isset($_SESSION['logged']) && !isset($_GET['editform']) || isset($_SESSION['logged']) && isset($_GET['editProfile'])) {
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
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

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
	
	//make database insertion
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
}//end user registration logic

//check if edit profile
if (isset($_GET['editform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';

	//Perform sanity check on email address
	//Get current user's email address
	try {
		$sql = 'SELECT id, email FROM person WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error updating user details' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

	//Store Current user's email address
	$row = $s->fetch();
	$currentEmail = $row['email'];
	//Check and store email address being submitted
	$subEmail = $_POST['email'];

	//check new email against old email
	if ($currentEmail != $subEmail) {

		//if emails don't match see if someone else is already using it
		try {
			$sql = 'SELECT * FROM person WHERE email = :email AND id != :id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':email', $subEmail);
			$s->bindValue(':id', $row['id']);
			$s->execute();
		}
		catch(PDOException $e) {
		$error = 'Error updating user details' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
		}
		//store results
		$rowB = $s->fetch();

		//if it's not empty, someone is already registered
		if (!empty($rowB)) {

			try {
				$sql = 'SELECT id, studentid, firstname, lastname, address1, address2, zip, email, type, status, password FROM person WHERE id = :id';
				$s = $pdo->prepare($sql);
				$s->bindValue(':id', $_POST['id']);
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
			$errorMessage = 'Whoops! look\'s like that email is already in use!';
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
	}

	//make database changes
	try {
		$sql = 'UPDATE person SET
			studentid = :studentid,
			firstname = :firstname,
			lastname = :lastname,
			address1 = :address1,
			address2 = :address2,
			zip = :zip,
			email = :email
			WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':studentid', $_POST['studentid']);
		$s->bindValue(':firstname', $_POST['firstname']);
		$s->bindValue(':lastname', $_POST['lastname']);
		$s->bindValue(':address1', $_POST['address1']);
		$s->bindValue(':address2', $_POST['address2']);
		$s->bindValue(':zip', $_POST['zip']);
		$s->bindValue(':email', $_POST['email']);
		$s->bindValue(':id', $_POST['id']);
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

	//After successful update, display success message and updated info
	try {
		$sql = 'SELECT id, studentid, firstname, lastname, address1, address2, zip, email, type, status FROM person WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error updating user details' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

	//store result from person query in $row
	$row = $s->fetch();

	//Set variables for populated registration form
	$panelTitle = 'Edit Profile';
	$errorMessage = 'Profile Updated Successfully';
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
	$id = $row['id'];
	$button = 'Update User';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'register_user.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//default values when coming from Register Link
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