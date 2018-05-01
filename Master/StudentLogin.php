<?php $title = "Student Login"; include 'header.php';?>

<form method="post" action="StudentLoginVerify.php">
<div>
<label><span>Username:</span>
<input type="text" id="AdminUsername" name="AdminUsername" />
</label>
</div>

<div>
<label><span>Password:</span>
<input type="password" id="StudentPassword" name="StudentPassword" />
</label>
</div>

<div>
<input type="submit" value="Submit" />
</div>

</form>

<?php include 'footer.php';?>