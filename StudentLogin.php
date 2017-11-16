<?php $title = "Student Login"; include 'header.php';?>

<form method="post" action="StudentLoginVerify.php">
	<label><span>Username:</span>
	<input type="text" id="AdminUsername" name="AdminUsername" />
	</label>

	<label><span>Password:</span>
	<input type="password" id="StudentPassword" name="StudentPassword" />
	</label>

	<input type="submit" value="Submit" />
</form>

<?php include 'footer.php';?>