<div class="content stripeInsideRental">
	<?php foreach($rentals as $rental): ?>
	<table>		
		<form action="" method="post">
		<tr>
			<th>Rental Number:</th>
			<td><?php htmlout($rental['id']); ?></td>
		</tr>		
		<tr>
			<th>Equipment Serial#:</th>
			<td><?php htmlout($rental['serialNo']); ?></td>
			<th>Equipment Name:</th>
			<td><?php htmlout($rental['eq_name']); ?></td>
		</tr>
		<tr>
			<th>Rented To:</th>
			<td><?php htmlout($rental['firstname'].' '.$rental['lastname']); ?></td>
			
		</tr>
		<tr>	
			<th>Date Out:</th>
			<td><?php htmlout($rental['date_out']); ?></td>
			<th>Date Due:</th>
			<td><?php htmlout($rental['date_due']); ?></td>
			<th>Status:</th>					
			<td><?php htmlout($rental['rental_status']); ?></td>	
		</tr>
		<tr>
			<td><input type="submit" name="action" value="Return Rental" /></td>
			<td><input type="hidden" name="rental_id" value="<?php echo $rental['id']; ?>" /></td>			
			<!-- <td><input type="submit" name="action" value="Delete" /></td> -->		
		</tr>
		</form>
	</table>
	<?php endforeach; ?>
</div>