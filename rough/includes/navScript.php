<?php
//check to see where we are and where we are going
if (isset($_GET['users'])) {	
	header('Location: /VCP279/rough/users/');
}
elseif (isset($_GET['equipment'])) {
	header('Location: /VCP279/rough/equipment/');
}
elseif (isset($_GET['rentals'])) {
	header('Location: /VCP279/rough/rentals/');
}
elseif (isset($_GET['profile'])) {
	header('Location: /VCP279/rough/register/');
}
elseif (isset($_GET['logout'])) {
	session_destroy();
	header('Location: /VCP279/rough/');
}