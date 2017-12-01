<?php $title="Sign Up"; include 'header.php';?>

<form action="InsertNewUser.php" method="post">

<div>
<label><span>First Name:</span>
<input type="text" placeholder="First Name" id="firstname" name="firstname" required />
</label>
</div>

<div>
<label><span>Last Name:</span>
<input type="text" placeholder="Last Name" id="lastname" name="lastname" required />
</label>
</div>

<div>
<label><span>User Name:</span>
<input type="text" placeholder="User Name" id="username" name="username" required />
</label>
</div>

<?php
if(isset($_SESSION["errorUser"]))
{
	$error = $_SESSION["errorUser"];
	session_unset($_SESSION["errorUser"]);
	$color = "red";
	echo '<div style="color:'.$color.'">'.$error.'</div>';
}
else{ echo '<br /><br />'; }
?>

<div>
<label><span>Password:</span>
<input type="password" placeholder="Password" id="password" name="password" required />
</label>
</div>

<div>
<label><span>Confirm Password:</span>
<input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" oninput="check(this)" required />
</label>
</div>

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

<div>
<label><span>Email Address:</span>
<input type="text" placeholder="Email" id="email" name="email" required />
</label>
</div>

<div>
<label><span>Confirm Email:</span>
<input type="text" placeholder="Confirm Email" id="confirm_email" name="confirm_email" required />
</label>
</div>

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

<?php include 'footer.php';?>