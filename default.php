<?php $title = "Teacher Tools"; include 'header.php';?>

<?php

if(!isset($_SESSION['StudentID']))
{
	echo '<p style="text-align: center;"><img alt="logo" src="images/logo.png" /></p>';
	echo '<p style="text-align: center;"><a href="Signup.php" class="button">Register for your account</a></p>';
}
?>

<?php
if(isset($_SESSION['FirstName']))
{
	echo "<p>Welcome, " . $_SESSION['FirstName'] . "!</p>";
}
?>


<?php include 'footer.php';?>