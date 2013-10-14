<?php
session_start();
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'User Administration';

//Check for add user
if (isset($_GET['addUser'])) {
	$row = array('type' => 'Student', 'status' => 'active');
	$panelTitle = 'New User';
	$action = 'addform';
	$studentid = '';
	$firstname = '';
	$lastname = '';
	$address1 = '';
	$address2 = '';
	$zip = '';
	$email = '';
	$id = '';
	$button = 'Add User';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addUserForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Check if addform has been submitted
if (isset($_GET['addform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'INSERT INTO person SET
			studentid = :studentid,
			firstname = :firstname,
			lastname = :lastname,
			address1 = :address1,
			address2 = :address2,
			zip = :zip,
			email = :email,
			type = :type,
			status = :status';
		$s = $pdo->prepare($sql);
		$s->bindValue(':studentid', $_POST['studentid']);
		$s->bindValue(':firstname', $_POST['firstname']);
		$s->bindValue(':lastname', $_POST['lastname']);
		$s->bindValue(':address1', $_POST['address1']);
		$s->bindValue(':address2', $_POST['address2']);
		$s->bindValue(':zip', $_POST['zip']);
		$s->bindValue(':email', $_POST['email']);
		$s->bindValue(':type', $_POST['type']);
		$s->bindValue(':status', $_POST['status']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error adding author' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	
	//Submit back to controller index
	header('Location: ./?listUsers');
	exit();
}

//Check if edit author has been submitted
if (isset($_POST['action']) && $_POST['action']=='Edit') {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	//Get author info from author table
	try {
		$sql = 'SELECT id, studentid, firstname, lastname, address1, address2, zip, email, type, status FROM person WHERE id = :id';
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
	$panelTitle = 'Edit User';
	$action = 'editform';
	$studentid = $row['studentid'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
	$zip = $row['zip'];
	$email = $row['email'];
	$id = $row['id'];
	$button = 'Update User';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addUserForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
	
}

//Check if editform has been submitted
if (isset($_GET['editform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'UPDATE person SET
			studentid = :studentid,
			firstname = :firstname,
			lastname = :lastname,
			address1 = :address1,
			address2 = :address2,
			zip = :zip,
			email = :email,
			type = :type,
			status = :status
			WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':studentid', $_POST['studentid']);
		$s->bindValue(':firstname', $_POST['firstname']);
		$s->bindValue(':lastname', $_POST['lastname']);
		$s->bindValue(':address1', $_POST['address1']);
		$s->bindValue(':address2', $_POST['address2']);
		$s->bindValue(':zip', $_POST['zip']);
		$s->bindValue(':email', $_POST['email']);
		$s->bindValue(':type', $_POST['type']);
		$s->bindValue(':status', $_POST['status']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error updating author' . $e->getMessage();
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
	
	//Set variables for populated author form
	$panelTitle = 'User Updated Successfully';
	$action = 'editform';
	$studentid = $row['studentid'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
	$zip = $row['zip'];
	$email = $row['email'];
	$id = $row['id'];
	$button = 'Update User';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addUserForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Check if delete user
if (isset($_POST['action']) && $_POST['action'] == 'Delete') {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'DELETE from person WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error deleting user from database' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	
	//Submit back to controller index
	header('Location: ./?listUsers');
	exit();
}

//Check for list users
if (isset($_GET['listUsers'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	//Try to get users from database
	try {
		$result = $pdo->query('SELECT id, firstname, lastname, type, status FROM person ORDER BY lastname ASC');
	}
	catch(PDOException $e) {
		$error = 'Error fetching users from the database' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	//Loop through users for output
	foreach ($result as $row) {
		$users[] = array('id'=>$row['id'], 'firstname'=>$row['firstname'], 'lastname'=>$row['lastname'], 'status'=>$row['status'], 'type'=>$row['type']);
	}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	//include template to display users
	include 'users.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Build page and Include initial user admin options nav
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
include 'localNav.html.php';
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';