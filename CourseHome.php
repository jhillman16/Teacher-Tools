<?php

session_start();
$title = $_SESSION['CourseName'];
include 'header.php';
include("ConnectDatabase.php"); //Goes through steps of connecting to database

$CourseID = $_SESSION['CourseID'];
$query = "SELECT * FROM Courses c LEFT JOIN TeacherUser t ON t.TeacherID = c.TeacherID WHERE CourseID = $CourseID";

echo "<h2>" . $_SESSION['CourseName'] . "</h2>";


if($r=mysqli_query($link, $query))
{
	$row=mysqli_fetch_array($r);

	echo "<h2>" . $_SESSION['CourseName'] . "</h2><br>";
	echo "<p>";
	echo $row['Description'] . "<br>";
	echo "Teacher: " . $row['FirstName'] . " " . $row['LastName'] . "(" . $row['Email'] . ")<br>";
	echo "Total Students: " . $row['EnrollmentNumber'] . "<br>";
	echo "</p>";

}





/*
//Attempt to get information about the courses
if( isset($_SESSION['TeacherID']) )
{
	$TeacherID = $_SESSION['TeacherID'];
	$query = "SELECT Name, NumSeats, CourseID FROM Courses WHERE TeacherID = " . $TeacherID;

	if($r=mysqli_query($link, $query))
	{
		while($row=mysqli_fetch_array($r))
		{
			echo "<button class='button' onclick='myFunction(" . $row['CourseID'] . ",\"" . $row['Name'] . "\")'>"
			 . $row['Name'] . ", " . $row['NumSeats'] . " seats </button><br><br>";
		}
	}
}
if( isset($_SESSION['StudentID']) )
{
	$StudentID = $_SESSION['StudentID'];
	$query = "SELECT c.Name, c.NumSeats, c.CourseID, t.FirstName, t.LastName
		  FROM Courses c, Enrollment e, TeacherUser t
		  WHERE e.StudentID = " . $StudentID . " AND e.CourseID = c.CourseID AND t.TeacherID = c.TeacherID";

	if($r=mysqli_query($link, $query))
	{
		while($row=mysqli_fetch_array($r))
		{
			echo "<button class='button' onclick='myFunction(" . $row['CourseID'] . ",\"" . $row['Name'] . "\")'>"
			 . $row['Name'] . ", " . $row['FirstName'] . " " . $row['LastName'] . ", "
			 . $row['NumSeats'] . " seats </button><br><br>";
		}
	}
}

*/

include 'footer.php';
?>