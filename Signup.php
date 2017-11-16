<?php $title="Sign Up"; include 'header.php';?>

<?php
session_start();
?>

<form action="InsertNewUser.php" method="post">
    
	<label><span>First Name:</span>
	<input type="text" placeholder="First Name" id="firstname" name="firstname" required />
	</label>

	<label><span>Last Name:</span>
	<input type="text" placeholder="Last Name" id="lastname" name="lastname" required />
	</label>

	<label><span>User Name:</span>
	<input type="text" placeholder="User Name" id="username" name="username" required />
	</label>

	<?php
	if(isset($_SESSION["errorUser"]))
	{
		$error = $_SESSION["errorUser"];
		session_unset($_SESSION["errorUser"]);
		$color = "red";
		echo '<div style="Color:'.$color.'">'.$error.'</div>';
	}
	else{ echo '<br /><br />'; }
	?>
    
	<label><span>Password:</span>
	<input type="password" placeholder="Password" id="password" name="password" required />
	</label>

	<label><span>Confirm Password:</span>
	<input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" oninput="check(this)" required />
	</label>

	<?php
	if(isset($_SESSION["errorPassword"]))
	{
		$error = $_SESSION["errorPassword"];
		session_unset($_SESSION["errorPassword"]);
		$color = "red";
		echo '<div style="color:'.$color.'">'.$error.'</div>';
	}
	else{ echo '<br /><br />'; }
	?>

	<label><span>Email Address:</span>
	<input type="text" placeholder="Email" id="email" name="email" required />
	</label>

	<label><span>Confirm Email:</span>
	<input type="text" placeholder="Confirm Email" id="confirm_email" name="confirm_email" required />
	</label>

	<?php
	if(isset($_SESSION["errorEmail"]))
	{
		$error = $_SESSION["errorEmail"];
		session_unset($_SESSION["errorEmail"]);
		$color = "red";
		echo '<div style="color:'.$color.'">'.$error.'</div>';
	}
	else{ echo '<br /><br />'; }
	?>

	<label class="radiob"><span>Student</span>
	<input type="radio" name="ans" id="student" value="student" />
	</label>
	<label class="radiob"><span>Educator</span>
	<input type="radio" name="ans" id="teacher" value="teacher" />
	</label>
	<br />
	<input type="submit" value="Submit" />
</form>

<?php include 'footer.php';?>