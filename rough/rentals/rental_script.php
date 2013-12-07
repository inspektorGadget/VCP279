<?php
//Include magic quotes fix
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/magicquotes.inc.php';
//nav script
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';
$pageTitle = 'Rental Administration';

//Check for add rental
//////////////////////
if (isset($_GET['addRental'])) {

	if (isset($_SESSION['errorMessage'])) {
		$errorMessage = $_SESSION['errorMessage'];
		unset($_SESSION['errorMessage']);
	}

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
if (isset($_GET['addform'])) {

	if ($_POST['student_id'] != 'selectStudent' && $_POST['equipment_id'] != 'selectEquipment') {
		include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';

		//get admin id, it's just easier to do it here(also im lazy)
		try {
			$sql = 'SELECT id FROM person WHERE email = :email';
			$s = $pdo->prepare($sql);
			$s->bindValue(':email', $_SESSION['email']);
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error finding Admin' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}
		$admin_id = $s->fetch();
		//make rental
		try {
			$sql = 'INSERT INTO rentals SET
				admin_id = :admin_id,
				student_id = :student_id,
				equipment_id = :equipment_id,
				date_due = :date_due,
				rental_status = :out,
				notes = :notes';
			$s = $pdo->prepare($sql);
			$s->bindValue(':admin_id', $admin_id['id']);
			$s->bindValue(':student_id', $_POST['student_id']);
			$s->bindValue(':equipment_id', $_POST['equipment_id']);
			$s->bindValue(':date_due', $_POST['date_due']);
			$s->bindValue(':out', 'out');
			$s->bindValue(':notes', $_POST['notes']);
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error adding rental' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}
		//set status of equipment to rented and add add student to rented to

		//lazy again
		try {
			$sql = 'SELECT firstname, lastname FROM person WHERE id = :student_id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':student_id', $_POST['student_id']);
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error finding Admin' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}
		$student_name = $s->fetch();

		try {
			$sql = 'UPDATE  equipment SET  
			status = :status,
			rentedTo = :rentedTo
			WHERE  id = :equipment_id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':equipment_id', $_POST['equipment_id']);
			$s->bindValue(':status', 'rented');
			$s->bindValue(':rentedTo', $student_name['firstname'].' '.$student_name['lastname']);
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error updating status of equipment' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}
		
		//Submit back to controller index
		header('Location: ./?listRentals');
		exit();
		}
		else {
			header('Location: ./?addRental');
			$_SESSION['errorMessage'] = 'Please fill in all required fields';
			exit();
		}
	
}

//Check if return rental
//////////////////////
if (isset($_POST['action']) && $_POST['action']=='Return Rental') {
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';
	
	try {
		$sql = 'SELECT equipment_id FROM rentals WHERE rental_id = :rental_id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':rental_id', $_POST['rental_id']);
		$s->execute();
	}
	catch(PDOException $e) {
			$error = 'Error selecting equipment for update' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}

	//store equipment id for further processing
		$equipment = $s->fetch();

	//first, return rental
	try {
			$sql = 'UPDATE  rentals SET  
			rental_status = :status
			WHERE  rental_id = :rental_id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':rental_id', $_POST['rental_id']);
			$s->bindValue(':status', 'returned');
			$s->execute();
		}
		catch(PDOException $e) {
			$error = 'Error returning rental' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
			include 'localNav.html.php';
			include 'error.html.php';
			include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';		
			exit();
		}	
	//then update equipment
	try {
			$sql = 'UPDATE  equipment SET  
			status = :status,
			rentedTo = :rentedTo
			WHERE  id = :equipment_id';
			$s = $pdo->prepare($sql);
			$s->bindValue(':equipment_id', $equipment['equipment_id']);
			$s->bindValue(':status', 'available');
			$s->bindValue(':rentedTo', 'available');
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

	//Submit back to controller index
		header('Location: ./?listRentals');
		exit();	
}

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