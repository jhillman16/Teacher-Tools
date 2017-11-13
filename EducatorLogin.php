<?php include 'header.php';?>

<section>
<header>
	<h1>Educator Login</h1>
</header>

<div id="content">

<form method="post" action="EducatorLoginVerify.php">
	<label for="AdminUsername">Username:</label>
	<input type="text" id="AdminUsername" name="AdminUsername"><br />
	<label for="EducatorPassword">Password:</label>
	<input type="password" name="EducatorPassword"><br />
	<input type="submit" value="Submit">
</form>

</div>

</section>

<?php include 'footer.php';?>