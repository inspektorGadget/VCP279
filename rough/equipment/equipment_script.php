<?php
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'Equipment Administration';

//Check for add equipment
if (isset($_GET['addEquipment'])) {
	$id = '';
	$row = array('type' => 'camera', 'status' => 'available');
	$panelTitle = 'New Equipment';
	$action = 'addform';
	$serialNo = '';
	$name = '';
	$description = '';
	$button = 'Add Equipment';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addEquipmentForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Check if addform has been submitted
if (isset($_GET['addform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'INSERT INTO equipment SET
			serialNo = :serialNo,
			name = :name,
			description = :description,			
			type = :type,
			status = :status';
		$s = $pdo->prepare($sql);
		$s->bindValue(':serialNo', $_POST['serialNo']);
		$s->bindValue(':name', $_POST['name']);
		$s->bindValue(':description', $_POST['description']);
		$s->bindValue(':type', $_POST['type']);
		$s->bindValue(':status', $_POST['status']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error adding author' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	
	//Submit back to controller index
	header('Location: ./?listEquipment');
	exit();
}

//Check if edit equipment has been submitted
if (isset($_POST['action']) && $_POST['action']=='Edit') {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	//Get equipment info from equipment table
	try {
		$sql = 'SELECT id, serialNo, name, LEFT(addedDate, 10), type, description, status, rentedTo FROM equipment WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error fetching equipment details' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

	//store result from equipment query in $row
	$row = $s->fetch();
	
	//Set variables for populated equipment form
	$panelTitle = 'Edit Equipment';
	$action = 'editform';
	$serialNo = $row['serialNo'];
	$name = $row['name'];
	$addedDate = $row['LEFT(addedDate, 10)'];
	$description = $row['description'];
	
	$rentedTo = $row['rentedTo'];
	$id = $row['id'];
	$button = 'Update Equipment';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addEquipmentForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
	
}

//Check if editform has been submitted
if (isset($_GET['editform'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'UPDATE equipment SET
			serialNo = :serialNo,
			name = :name,
			description = :description,
			type = :type,
			status = :status
			WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->bindValue(':serialNo', $_POST['serialNo']);
		$s->bindValue(':name', $_POST['name']);
		$s->bindValue(':description', $_POST['description']);		
		$s->bindValue(':type', $_POST['type']);
		$s->bindValue(':status', $_POST['status']);
		$s->execute();
	}
	catch(PDOException $e) {
		$error = 'Error updating equipment' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	
	//After successful update, display success message and updated info
	try {
		$sql = 'SELECT id, serialNo, name, LEFT(addedDate, 10), type, description, status, rentedTo FROM equipment WHERE id = :id';
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

	//store result from equipment query in $row
	$row = $s->fetch();
	
	//Set variables for populated equipment form
	$panelTitle = 'Equipment Updated Successfully';
	$action = 'editform';
	$serialNo = $row['serialNo'];
	$name = $row['name'];
	$addedDate = $row['LEFT(addedDate, 10)'];
	$description = $row['description'];
	$rentedTo = $row['rentedTo'];
	$id = $row['id'];
	$button = 'Update Equipment';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addEquipmentForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
	
}

//Check if delete user
if (isset($_POST['action']) && $_POST['action'] == 'Delete') {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'DELETE from equipment WHERE id = :id';
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
	header('Location: ./?listEquipment');
	exit();
}

//Check for list equipment
if (isset($_GET['listEquipment'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	//Try to get equipment from database
	try {
		$result = $pdo->query('SELECT id, serialNo, name, type, status, rentedTo FROM equipment ORDER BY type ASC');
	}
	catch(PDOException $e) {
		$error = 'Error fetching equipment from the database' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	//Loop through equipment for output
	foreach ($result as $row) {
		$items[] = array('id'=>$row['id'], 'serialNo'=>$row['serialNo'], 'name'=>$row['name'], 'type'=>$row['type'],
										 'status'=>$row['status'], 'rentedTo'=>$row['rentedTo']);
	}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	//include template to display equipment
	include 'equipment.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Build page and Include initial euqipment admin options nav
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
include 'localNav.html.php';
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';