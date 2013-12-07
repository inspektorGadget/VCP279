<?php
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'User Administration';

//Check for add rental
//////////////////////
if (isset($_GET['addRental'])) {
	$panelTitle = 'New Rental';
	$action = 'addform';
	$student_id = '';
	$admin_id = $_SESSION['email'];
	$equipment_id = '';
	// $date_created = '';
	$date_due = '';
	$rental_status = '';
	$notes = '';
	$rental_id = 'NEW';
	$button = 'Add Rental';

//Connect to DB
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
//Gather eligible users for selection
	try {
		$result = $pdo->query('SELECT id, firstname, lastname, email FROM person WHERE status = \'active\'');		
	}
	catch(PDOException $e) {
		$error = 'Error fetching eligible users' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

//store users for output
	foreach ($result as $row) {
		$users[] = array('id'=>$row['id'], 'firstname'=>$row['firstname'], 'lastname'=>$row['lastname'], 'email'=>$row['email']);
	}

//Gather equipment
	try {
		$result = $pdo->query('SELECT id, serialNo, name, type FROM equipment WHERE status = \'available\' ORDER BY type ASC');
	}
	catch(PDOException $e) {
		$error = 'Error fetching eligible users' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}

//store equipment for output
	foreach ($result as $row) {
		$equipments[] = array('id'=>$row['id'], 'serialNo'=>$row['serialNo'], 'name'=>$row['name'], 'type'=>$row['type']);
	}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	include 'addRentalForm.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}
//Check for add form
//////////////////////

//Check if edit rental
//////////////////////

//Check for list rentals
if (isset($_GET['listRentals'])) {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	//Try to get rentals from database
	try {
		$result = $pdo->query('SELECT firstname, lastname, equipment.name, serialNo, rental_id,
			LEFT(date_created, 10), date_due, rental_status FROM person INNER JOIN rentals ON
			student_id = person.id INNER JOIN equipment ON equipment_id = equipment.id ORDER BY rental_status ASC');
	}
	catch(PDOException $e) {
		$error = 'Error fetching rentals from the database' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
		include 'localNav.html.php';
		include 'error.html.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
		exit();
	}
	//Loop through rentals for output
	foreach ($result as $row) {
		$rentals[] = array('id'=>$row['rental_id'], 'firstname'=>$row['firstname'], 'lastname'=>$row['lastname'], 'eq_name'=>$row['name'], 'serialNo'=>$row['serialNo'], 'date_out'=>$row['LEFT(date_created, 10)'], 'date_due'=>$row['date_due'], 'rental_status'=>$row['rental_status']);
	}
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include 'localNav.html.php';
	//include template to display rentals
	include 'rentals.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
	exit();
}

//Build page and Include initial user admin options nav
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
include 'localNav.html.php';
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';