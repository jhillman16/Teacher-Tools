<?php $title = "Create a Course"; include 'header.php';

session_start();

if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);

	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}
?>

<form action="ClassCreate.php" method="post">

<div>
<label><span>Course Name:</span>
<input type="text" placeholder="Course Name" name="courseName" required />
</label>
</div>

<div>
<label><span>Number of Open Seats:</span>
<input type="text" placeholder="Number of Seats" name="numSeats" required />
</label>
</div>

<div>
<label><span>Description:</span>
<textarea placeholder="Description" name="description" required></textarea>
</label>
</div>

<div>
<input type="submit" value="Submit" />
</div>

</form>

<?php include 'footer.php';?>