<?php $title = "My Students"; include 'header.php';?>

<?php

session_start();

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$query = "";


//Attempt to get information about the courses
if( isset($_SESSION['TeacherID']) )
{
	$TeacherID = $_SESSION['TeacherID'];
	
	$query2 = "SELECT UserName,FirstName FROM StudentsUser WHERE StudentID IN (SELECT StudentID FROM `Enrollment` WHERE CourseID  IN (SELECT CourseID FROM Courses WHERE TeacherID = $TeacherID))";
			
	if($r=mysqli_query($link, $query2))
	{
		while($row=mysqli_fetch_array($r))
		{
			echo $row['FirstName'] . "<br>";    		
		}

	}

}

?>
<?php include 'footer.php';?>