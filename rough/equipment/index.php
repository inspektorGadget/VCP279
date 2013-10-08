<?php 
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';

//Check for add author
if (isset($_GET['addUser'])) {
	$row = array('type' => 'Student', 'status' => 'active');
	$pageTitle = 'New User';
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
	
	include 'addUserForm.html.php';
	exit();
}

//Check if addform has been submitted
if (isset($_GET['addform'])) {
	include '../includes/db.inc.php';
	
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
		include 'error.html.php';
		exit();
	}
	
	//Submit back to controller index
	header('Location: ./?listUsers');
	exit();
}

//Check if edit author has been submitted
if (isset($_POST['action']) && $_POST['action']=='Edit') {
	include '../includes/db.inc.php';
	
	//Get author info from author table
	try {
		$sql = 'SELECT id, studentid, firstname, lastname, address1, address2, zip, email, type, status FROM person WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error fetching user details' . $e->getMessage();
		include 'error.html.php';
		exit();
	}

	//store result from person query in $row
	$row = $s->fetch();
	
	//Set variables for populated author form
	$pageTitle = 'Edit User';
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
	
	include 'addUserForm.html.php';
	exit();
	
}

//Check if editform has been submitted
if (isset($_GET['editform'])) {
	include '../includes/db.inc.php';
	
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
		include 'error.html.php';
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
		include 'error.html.php';
		exit();
	}

	//store result from person query in $row
	$row = $s->fetch();
	
	//Set variables for populated author form
	$pageTitle = 'User Updated Successfully';
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
	
	include 'addUserForm.html.php';
	exit();
}

//Check if delete author
if (isset($_POST['action']) && $_POST['action'] == 'Delete') {
	include '../includes/db.inc.php';
	
	try {
		$sql = 'DELETE from equipment WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error deleting equipment from database' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	
	//Submit back to controller index
	header('Location: ./?listEquipment');
	exit();
}

//Check for list equipment
if (isset($_GET['listEquipment'])) {
	include '../includes/db.inc.php';
	//Try to get users from database
	try {
		$result = $pdo->query('SELECT id, serialNo, name, status, rentedTo FROM equipment');
	}
	catch(PDOException $e) {
		$error = 'Error fetching equipment from the database' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	//Loop through users for output
	foreach ($result as $row) {
		$cameras[] = array('id'=>$row['id'], 'serialNo'=>$row['serialNo'], 'name'=>$row['name'], 'status'=>$row['status'], 'rentedTo'=>$row['rentedTo']);
	}
	//include template to display users
	include 'equipment.html.php';
	exit();
}

//Include initial user admin options nav
include 'equipmentAdminStart.html.php';