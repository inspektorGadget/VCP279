<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/navScript.php';

if (isset($_SESSION['user'])) {

	$pageTitle = 'VCP Rental Admin';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
}
elseif (isset($_POST['userName'])) {
	$_SESSION['user'] = $_POST['userName'];
	$_SESSION['password'] = $_POST['password'];
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/db.inc.php';

	$pageTitle = 'VCP Rental Admin';
	
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/header.html.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/footer.html.php';
} 
else {
	$pageTitle = "User Login";
	include $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/loginForm.html.php';
}
