<div class="content">
<h1><?php htmlout($panelTitle); ?></h1>
<form action="?<?php htmlout($action); ?>" method="post">
	<table>
		<tr>
			<td>
				<label for"serialNo">Serial No:</label>
			</td>
			<td>
				<input type="text" name="serialNo" id="serialNo" value="<?php htmlout($serialNo); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="name">Name:</label>
			</td>
			<td>
				<input type="text" name="name" id="name" value="<?php htmlout($name); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="addedDate">Date Added:</label>
			</td>
			<td>
				<?php
				if (!isset($addedDate)) {
					echo Date("F d, Y");
				} 
				else {
					htmlout($addedDate);
				}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="rentedTo">Rented To:</label>
			</td>
			<td>
				<?php
				if (!isset($rentedTo)) {
					echo "available";
				} 
				else {
					htmlout($rentedTo);
				}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="description">Description:</label>
			</td>
			<td>
				<textarea cols="50" rows="5" name="description" id="description">
					<?php htmlout($description); ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label for="type">Type:</label>
			</td>
			<td>
				<select name="type" id="type">
					<option value="camera" <?php if ($row['type']=='camera') {echo "selected=\"selected\"";}?>>camera</option>
					<option value="video camera" <?php if ($row['type']=='video camera') {echo "selected=\"selected\"";}?>>video camera</option>
					<option value="lighting" <?php if ($row['type']=='lighting') {echo "selected=\"selected\"";}?>>lighting</option>
					<option value="accessory" <?php if ($row['type']=='accessory') {echo "selected=\"selected\"";}?>>accessory</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="status">Status:</label>
			</td>
			<td>
				<select name="status" id="status">
					<option value="available" <?php if ($row['status']=='available') {echo "selected=\"selected\"";}?>>available</option>
					<option value="rented" <?php if ($row['status']=='rented') {echo "selected=\"selected\"";}?>>rented</option>
					<option value="repair" <?php if ($row['status']=='repair') {echo "selected=\"selected\"";}?>>repair</option>
					<option value="inactive" <?php if ($row['status']=='inactive') {echo "selected=\"selected\"";}?>>invactive</option>
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