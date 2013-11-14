<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/VCP279/rough/includes/helpers.inc.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="/VCP279/rough/includes/css/mainStyles.css" rel="stylesheet" type="text/css" />
		<title><?php htmlout($pageTitle); ?></title>
	</head>

	<body>
		<div id="loginDiv" class="pageCenter">
			<h1><?php htmlout($pageTitle)?></h1>
			<form action="" method="post">
				<table>
					<tr>
						<td>
							<label for="email">Email Address:</label>
							<input type="text" name="email" id="email" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Login" />
						</td>
					</tr>
					<tr>
						<td>
							<a href="?profile">Register!</a>
						</td>
					</tr>
				</table>				
			</form>
			<div>
				<p class="errorColor">
					<?php 
					if (isset ($_SESSION['error'])) {
						echo $_SESSION['error'];
					}
					elseif (isset($_SESSION['message'])) {
						echo $_SESSION['message'];
					}
					?>
				</p>
			</div>
		</div>
	</body>
</html>
