<div class="content">
<h1><?php htmlout($panelTitle); ?></h1>
<div id="messages">
	<p class="light">
		Please Change Your Password Below.
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
				<label for"currentPasswordCheck">Current Password:</label>
			</td>
			<td>
				<input type="password" name="currentPasswordCheck" id="currentPasswordCheck" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="newPassword">New Password:</label>
			</td>
			<td>
				<input type="password" name="newPassword" id="newPassword" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="newPasswordVerify">Verify Password:</label>
			</td>
			<td>
				<input type="password" name="newPasswordVerify" id="newPasswordVerify" />
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