<?php
session_start();
if ($_SESSION['logged']) {
	include 'equipment_script.php';				
}
else {
	$_SESSION['error'] = 'Whoops! Looks like you need to log in!';
	header('Location: /VCP279/rough/');
}