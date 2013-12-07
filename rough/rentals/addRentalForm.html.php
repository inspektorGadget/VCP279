<div class="content">
<h1><?php htmlout($panelTitle); ?></h1>
<div id="messages">
	<?php 
	if (isset($errorMessage)) {
		echo "<p class=\"errorColor\">" . $errorMessage . "</p>";
	}
?>
</div>
<form action="?<?php htmlout($action); ?>" method="post">
	<table>
		<tr>
			<td>
				<label for"rental_id">Rental ID:</label>
			</td>
			<td>
				<?php htmlout($rental_id); ?>
			</td>
		</tr>
		<tr>
			<td>
				<label for"admin_id">Admin:</label>
			</td>
			<td>
				<?php htmlout($admin_id); ?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="student_id">Rented To:</label>
			</td>
			<td>
				<select name="student_id">
					<option value="selectStudent">Select Student</option>
					<?php foreach($users as $user): ?>
					<option value="<?php htmlout($user['id']); ?>">
						<?php
						echo $user['firstname'] ." ". $user['lastname'];
						?>
					</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="equipment_id">Equipment:</label>
			</td>
			<td>
				<select name="equipment_id">
					<option value="selectEquipment">Select Equipment</option>
					<?php foreach($equipments as $equipment): ?>
					<option value="<?php htmlout($equipment['id']); ?>">
						<?php
						echo $equipment['type'] .' '. $equipment['name'] .' '. $equipment['serialNo'];
						?>
					</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="date_created">Date Added:</label>
			</td>
			<td>
				<?php
				if (!isset($date_created)) {
					echo Date("F d, Y");
				} 
				else {
					htmlout($date_created);
				}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="date_due">Date Due:</label>
			</td>
			<td>
				<input type="date" name="date_due">
			</td>
		</tr>
		<tr>
			<td>
				<label for="notes">notes:</label>
			</td>
			<td>
				<textarea cols="50" rows="5" name="notes" id="notes">
					<?php htmlout($notes); ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="id" value="<?php htmlout($rental_id); ?>" />
				<input type="submit" value="<?php htmlout($button); ?>" />
			</td>
		</tr>
	</table>
</form>
</div>