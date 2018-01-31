<?php $title = "Teacher Tools"; include 'header.php';?>
<<<<<<< HEAD

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

=======

<div style="display: none;">
<p>What to display on a home page?</p>

<p>Logged in:</p>
<ul>
	<li>list of classes
	<ul>
		<li>teaching if account flagged educator</li>
		<li>taking if account flagged student</li>
	</ul>
	</li>
</ul>

<p>Logged out:</p>
<ul>
	<li>description of website</li>
	<li>registration/login link</li>
</ul>
</div>

<p style="text-align: center;"><img alt="logo" src="images/logo.png" /></p>

<p style="text-align: center;"><a href="Signup.php" class="button">Register for your account</a></p>
>>>>>>> c9d0c128aa5ebf91d81590e4281aeff8b339bb38

<?php include 'footer.php';?>