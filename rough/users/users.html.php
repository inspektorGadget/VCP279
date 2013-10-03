<?php
include_once '../includes/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Users</title>
	</head>

	<body>
		<div>
			<header>
				<h1>Users</h1>
			</header>
		</div>
		<div>
			<h3><a href="?addUser">Add new user</a></h3>
			<ul>
			<?php foreach($users as $user): ?>
				<li>
					<form action="listUsers" method="post">
						<table>
							<tr>
								<td><?php htmlout($user['firstname']); ?></td>
								<td><?php htmlout($user['lastname']); ?></td>
							</tr>
							<tr>
								<td><input type="hidden" name="id" value="<?php echo $user['id']; ?>" /></td>
								<td><input type="submit" name="action" value="Edit" /></td>
								<td><input type="submit" name="action" value="Delete" /></td>
							</tr>																		
						</table>
					</form>
				</li>
			<?php endforeach; ?>
			</ul>
			<p>
				<a href="../">Return to User Administration</a>
			</p>
		</div>
	</body>
</html>
