<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Users</title>
	</head>
	<body>
		<p>Here are the users!</p>
		<table>
		<?php foreach ($users as $user): ?>
			<form action="?deleteuser" method="post">
				<tr>
					<td>First Name:</td>
					<td><?php echo htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8'); ?></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><?php echo htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8'); ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
						<input type="submit" value="Delete" />
					</td>
				</tr>																								
			</form>
		<?php endforeach; ?>
		</table>
	</body>
</html>

