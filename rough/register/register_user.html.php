<div class="content">
<h1><?php htmlout($panelTitle); ?></h1>
<div id="messages">
	<p class="light">
		If you would like to update your profile, please do so below.
	</p>
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
				<label for"studentid">Student ID:</label>
			</td>
			<td>
				<input type="text" name="studentid" id="studentid" value="<?php htmlout($studentid); ?>" />
			</td>
		</tr>
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
		<?php if ($action == 'addform') {
			echo '
				<tr>
					<td>
						<label for="password">Password:</label>
					</td>
					<td>
						<input type="password" name="password" id="password" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="confirmPassword">Confirm Password:</label>
					</td>
					<td>
						<input type="password" name="confirmPassword" id="confirmPassword" />
					</td>
				</tr>
			';
		}?>
		<tr>
			<td>
				<label for="type">Type:</label>
			</td>
			<td>
				<?php htmlout($type) ?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="status">Status:</label>
			</td>
			<td>
				<?php htmlout($status) ?>
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