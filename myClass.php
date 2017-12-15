<?php $title = "My Classes"; include 'header.php';?>

	<p>Welcome to Your Class</p>

<?php

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$query = "";

//Attempt to get information about the courses
if( isset($_SESSION['TeacherID']) )
{
	$TeacherID = $_SESSION['TeacherID'];
	$query = "SELECT Name, NumSeats FROM Courses WHERE TeacherID = " . $TeacherID;

	if($r=mysqli_query($link, $query))
	{
		echo "<table border='1'><thead><tr><th>Class Name</th><th>Number Seats</th></tr></thead>";
		while($row=mysqli_fetch_array($r))
		{
			echo "<tr>";    
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['NumSeats'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
if( isset($_SESSION['StudentID']) )
{
	$StudentID = $_SESSION['StudentID'];
	$query = "SELECT c.Name, c.NumSeats, t.FirstName, t.LastName
		  FROM Courses c, Enrollment e, TeacherUser t
		  WHERE e.StudentID = " . $StudentID . " AND e.CourseID = c.CourseID AND t.TeacherID = c.TeacherID";

	if($r=mysqli_query($link, $query))
	{
		echo "<table border='1'><thead><tr><th>Class Name</th><th>Teacher Name</th><th>Number Seats</th></tr></thead>";
		while($row=mysqli_fetch_array($r))
		{
			echo "<tr>";    
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
			echo "<td>" . $row['NumSeats'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}


?>


<?php include 'footer.php';?>