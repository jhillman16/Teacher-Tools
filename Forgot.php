<?php $title = "Forgot"; include 'header.php';?>

<form method="post" action="SendPassword.php">

	<div>
		<label><span>Username/Email:</span>
			<input type="text" id="username" name="username" />
		</label>
	</div>

	<div>
		<label>
			<input type="radio" name="ans" id="student" value="student" /><span>Student</span>
		</label>
		<label>
			<input type="radio" name="ans" id="teacher" value="teacher" /><span>Educator</span>
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