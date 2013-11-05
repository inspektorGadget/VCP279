<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'admin') {
	include 'users_script.php';				
}
else {
	$_SESSION['error'] = 'Whoops! Looks like you\'re not logged in as an admin!';
	header('Location: /VCP279/rough/');
}