<?php $title = "My Assignments"; include 'header.php';?>

<script>
//Parameter course is the course ID associated with the class button that is clicked on.
//Sends to php script to set the course ID cookie for the user
function myFunction(AssignmentID)
{
    document.cookie = "AssignmentID=" + AssignmentID;
    window.location = 'QuizDesc.php';
	
}
</script>


<?php
include("ConnectDatabase.php"); //Goes through steps of connecting to database

$query = "";

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


?>