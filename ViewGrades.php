<?php
$title = "Performance - " . $_SESSION['CourseName']; 
include 'header.php';
session_start();

if(!isset($_SESSION['CourseID']))
{
	header('Location: myClass.php');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

echo "<h2>Select a student to view performance in course.<h2><br>";

/*
$query = "SELECT UserName, FirstName, LastName, StudentID FROM StudentsUser WHERE StudentID IN (SELECT StudentID FROM Enrollment WHERE CourseID = $CourseID)";

//Attempt to get students's information taking the course

if($r=mysqli_query($link, $query))
{
	while($row=mysqli_fetch_array($r))
	{
		echo "<button class='button' onclick='myFunction(" . $row['StudentID'] . ")'>"
			 . $row['FirstName'] . " " . $row['LastName'] . " (" . $row['UserName'] . ")</button><br><br>";    		
	}

}
*/

include 'footer.php';
?>