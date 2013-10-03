<?php 
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';

//Check for add author
//Check if add author has been clicked
if (isset($_GET['addUser'])) {
	$pageTitle = 'New User';
	$action = 'addform';
	$firstname = '';
	$lastname = '';
	$address1 = '';
	$address2 = '';
	$zip = '';
	$email = '';
	$id = '';
	$button = 'Add User';
	
	include 'addUserForm.html.php';
	exit();
}

//Check if addform has been submitted
if (isset($_GET['addform'])) {
	include '../includes/db.inc.php';
	
	try {
		$sql = 'INSERT INTO person SET
			firstname = :firstname,
			lastname = :lastname,
			address1 = :address1,
			address2 = :address2,
			zip = :zip,
			email = :email,
			type = :type,
			status = :status';
		$s = $pdo->prepare($sql);
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
		include 'error.html.php';
		exit();
	}
	
	//Submit back to controller index
	header('Location: ./?listUsers');
	exit();
}

//Check for list users
if (isset($_GET['listUsers'])) {
	include '../includes/db.inc.php';
	//Try to get users from database
	try {
		$result = $pdo->query('SELECT id, firstname, lastname FROM person ORDER BY lastname ASC');
	}
	catch(PDOException $e) {
		$error = 'Error fetching users from the database' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	//Loop through users for output
	foreach ($result as $row) {
		$users[] = array('id'=>$row['id'], 'firstname'=>$row['firstname'], 'lastname'=>$row['lastname']);
	}
	//include template to display users
	include 'users.html.php';
	exit();
}

//Include initial user admin options nav
include 'userAdminStart.html.php';