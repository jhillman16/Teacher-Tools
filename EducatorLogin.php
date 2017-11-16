<?php $title = "Educator Login"; include 'header.php';?>

<form method="post" action="EducatorLoginVerify.php">
	<label><span>Username:</span>
	<input type="text" id="AdminUsername" name="AdminUsername" />
	</label>

	<label><span>Password:</span>
	<input type="password" id="EducatorPassword" name="EducatorPassword" />
	</label>

	<input type="submit" value="Submit" />
</form>

<?php include 'footer.php';?>