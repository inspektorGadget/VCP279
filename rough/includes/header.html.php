<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/helpers.inc.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<script src="/VCP279/rough/includes/js/core.js"></script>
		<script src="/VCP279/rough/includes/js/styles.js"></script>
		<link href="/VCP279/rough/includes/css/mainStyles.css" rel="stylesheet" type="text/css" />
		<title><?php htmlout($pageTitle); ?></title>

	</head>

	<body>
		<div id="container">
			
			<div id="headerBanner">
				<h1 id="headerBannerTitle"><?php htmlout($pageTitle); ?></h1>
				<?php
				if (isset($_SESSION['user'])) {
					echo "<a href=\"?logout\" id=\"logOutLink\">&gt; logout".$_SESSION['user']."</a>";
				}
				?>
			</div>	
			
			<div id="navTopDiv">
				<ul id="mainNavTop">
					<li><a href="?users"><h3>&gt;Manage Users</h3></a></li>
					<li><a href="?equipment"><h3>&gt;Manage Equipment</h3></a></li>
					<li><a href="?rentals"><h3>&gt;Manage Rentals</h3></a></li>
					<li><a href="?profile"><h3>&gt;Manage Profile</h3></a></li>
				</ul>
			</div>
	
											
		