
<div class="content">
	<table class="stripeInside">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Type</th>
			<th>Status</th>			
			<th colspan="2">&nbsp;</th>			
		</tr>
		<?php foreach($users as $user): ?>
			<tr>
				<form action="" method="post">
						<td><?php htmlout($user['firstname']); ?></td>
						<td><?php htmlout($user['lastname']); ?></td>
						<td><?php htmlout($user['type']); ?></td>
						<td><?php htmlout($user['status']); ?></td>
						<td><input type="hidden" name="id" value="<?php echo $user['id']; ?>" /></td>
						<td><input type="submit" name="action" value="Edit" /></td>
						<!-- <td><input type="submit" name="action" value="Delete" /></td> -->
				</form>
			</tr>
		<?php endforeach; ?>
	</table>
</div>