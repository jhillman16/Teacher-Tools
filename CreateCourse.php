<?php $title = "Create a Course"; include 'header.php';?>

<?php
session_start();

if(!isset($_SESSION['FirstName']))
{
    $_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
    header('Location: EducatorLogin.php');
}
?>

<form action="ClassCreate.php" method="post">
    
	<label for="courseName">Course Name:</label>
	<input type="text" placeholder="Course Name" name="courseName" required><br />

	<label for="numSeats">Number of Open Seats:</label>
	<input type="text" placeholder="Number of Seats" name="numSeats" required><br />

	<label for="description">Description:</label>
	<textarea placeholder="Description" name="description" required></textarea>
	<br />
	<input type="submit" value="Submit">

</form>

<?php include 'footer.php';?>