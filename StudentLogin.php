<?php include 'header.php';?>

<section>
<header>
	<h1>Student Login</h1>
</header>

<div id="content">

<form method="post" action="StudentLoginVerify.php">
	<label for="AdminUsername">Username:</label>
	<input type="text" id="AdminUsername" name="AdminUsername"><br />
	<label for="StudentPassword">Password:</label>
	<input type="password" id="StudentPassword" name="StudentPassword"><br />
	<input type="submit" value="Submit">
</form>

</div>

</section>

<?php include 'footer.php';?>