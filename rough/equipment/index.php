<?php
session_start();
if ($_SESSION['logged'] == 'edit') {
	include 'equipment_script.php';				
}
else {
	$_SESSION['error'] = 'Whoops! Looks like you\'re not logged in as an admin!';
	header('Location: /VCP279/rough/');
}