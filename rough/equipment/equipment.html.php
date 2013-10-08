<?php
include_once '../includes/helpers.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Equipment</title>
	</head>

	<body>
		<div>
			<header>
				<h1>Equipment</h1>
			</header>
		</div>
		<div>
			<h3><a href="?addUser">Add new equipment</a></h3>
			<table>
				<?php foreach($cameras as $camera): ?>
					<tr>
						<form action="" method="post">
							<tr>
								<td><?php htmlout($camera['name']); ?></td>
								<td><?php htmlout($camera['serialNo']); ?></td>
								<td><?php htmlout($camera['status']); ?></td>
								<td><?php htmlout($camera['rentedTo']); ?></td>
								<td><input type="hidden" name="id" value="<?php echo $camera['id']; ?>" /></td>
								<td><input type="submit" name="action" value="Edit" /></td>
								<td><input type="submit" name="action" value="Delete" /></td>
							</tr>
						</form>
					</tr>
				<?php endforeach; ?>
			</table>
			<p>
				<a href="../">Return to Camera Administration</a>
			</p>
		</div>
	</body>
</html>
