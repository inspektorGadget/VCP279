<?php
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'User Administration';

//Check for add rental
//////////////////////

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