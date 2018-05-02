<?php $title = "Login"; include 'header.php';?>

<form method="post" action="LoginVerify.php">

<div>
<label><span>Username/Email:</span>
<input type="text" id="Username" name="Username" />
</label>
</div>

<div>
<label><span>Password:</span>
<input type="password" id="Password" name="Password" />
</label>
</div>

<div>
<input type="submit" value="Submit" onclick="clearLogin()" />
</div>

</form>

<br><a href="Forgot.php">Forgot password? Click here!</a><br>

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