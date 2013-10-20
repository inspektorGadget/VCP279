
<div class="content">
	<table class="stripeInside">
		<tr>
			<th>Serial No</th>
			<th>Name</th>
			<th>Type</th>
			<th>Status</th>
			<th>Rented To</th>
			<th colspan="3">&nbsp;</th>
		</tr>
		<?php foreach($items as $item): ?>
			<tr>
				<form action="" method="post">
						<td><?php htmlout($item['serialNo']); ?></td>
						<td><?php htmlout($item['name']); ?></td>						
						<td><?php htmlout($item['type']); ?></td>						
						<td><?php htmlout($item['status']); ?></td>
						<td><?php htmlout($item['rentedTo']); ?></td>						
						<td><input type="hidden" name="id" value="<?php echo $item['id']; ?>" /></td>
						<td><input type="submit" name="action" value="Edit" /></td>
						<td><input type="submit" name="action" value="Delete" /></td>
				</form>
			</tr>
		<?php endforeach; ?>
	</table>
</div>