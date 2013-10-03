<?php include_once '../includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php htmlout($pageTitle); ?></title>
	</head>
	<body>
		<h1><?php htmlout($pageTitle); ?></h1>
		<form action="?<?php htmlout($action); ?>" method="post">
			<table>
				<tr>
					<td>
						<label for="firstname">First Name:</label>
					</td>
					<td>
						<input type="text" name="firstname" id="firstname" value="<?php htmlout($firstname); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="lastname">Last Name:</label>
					</td>
					<td>
						<input type="text" name="lastname" id="firstname" value="<?php htmlout($lastname); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="address1">Address 1</label>
					</td>
					<td>
						<input type="text" name="address1" id="address1" value="<?php htmlout($address1); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="address2">Address 2</label>
					</td>
					<td>
						<input type="text" name="address2" id="address2" value="<?php htmlout($address2); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="zip">Zip:</label>
					</td>
					<td>
						<input type="text" name="zip" id="zip" value="<?php htmlout($zip); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">Email:</label>
					</td>
					<td>
						<input type="text" name="email" id="email" value="<?php htmlout($email); ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="type">Type:</label>
					</td>
					<td>
						<select name="type" id="type">
							<option value="Admin">Admin</option>
							<option value="Frontend">Frontend</option>
							<option value="Student">Student</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label for="status">Status:</label>
					</td>
					<td>
						<select name="status" id="status">
							<option value="active">active</option>
							<option value="disabled">disabled</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php htmlout($id); ?>" />
						<input type="submit" value="<?php htmlout($button); ?>" />
					</td>
				</tr>
			</table>
		</form>
		<div>
			<p>
				<a href="../">Return to User Administration</a>
			</p>
		</div>
	</body>
</html>