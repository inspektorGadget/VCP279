<?php
if (get_magic_quotes_gpc()) { $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v) { unset($process[$key][$k]);
			if (is_array($v)) { $process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			} else { $process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	} unset($process);
}

//Check for credentials
/*
if (!isset($_GET['login'])) {
	include 'login.html.php';
	exit();
}*/


//If credentials connect to database
/*
$uname = $_POST['username'];
$pword = $_POST['password'];*/

try {
	$pdo = new PDO('mysql:host=localhost;dbname=vcp279test', 'vcpadmin', 'admin');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo -> exec('SET NAMES "utf8"');
} 
catch (PDOException $e) {
	$error = "Unable to connect to the database server. ";
	include 'error.html.php';
	exit();
}

//After connection display admin options
include 'adminpanel.html.php';

//If $_GET['listusers] pull user data from person table
if (isset($_GET['listusers'])) {
	//pulling data
	try {
	$sql = 'SELECT firstname, lastname, email, id FROM person';
	$result = $pdo -> query($sql);
	} 
	catch (PDOException $e) {
	$error = 'Error fetching jokes ' . $e -> getMessage();
	include 'error.html.php';
	exit();
	}
	
	//loop through user query result and store in array
	foreach ($result as $row) {
		$users[] = array(
			'id'=>$row['id'], 
			'firstname'=>$row['firstname'],
			'lastname'=>$row['lastname'],
			'email'=>$row['email']
		);
	}
	
	//show users
	include 'users.html.php';
}


?>