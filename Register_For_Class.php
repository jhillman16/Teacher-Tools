<?php $title = "Search for a Course"; include 'header.php'; include 'checkSession.php';?>

<?php
if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);

	header_remove();
	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}
?>

<form action="Register_For_Class2.php" method="post">

<div>
<label><span style="white-space: nowrap; width: 400px;">Search by Professor First Name, Last Name, or Class Name:</span>
<input type="text" placeholder="Search" name="SearchText" required />
</label>
</div>
    
<div>
<input type="submit" value="Submit" />
</div>

</form>

<?php
if(isset($_SESSION["error"]))
{
	$error = $_SESSION["error"];
	session_unset($_SESSION["error"]);
	$color = "red";
	echo '<div style="color:'.$color.'">'.$error.'</div>';
}

include 'footer.php';
?>