<?php

session_start();
if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
	header('Location: StudentLogin.php');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$StudentID = $_SESSION['StudentID'];
$CourseID = $_COOKIE['CourseID'];
unset($_COOKIE['CourseID']);

//Check if student id already registered for the class
$query = "SELECT StudentID FROM Enrollment WHERE StudentID = $StudentID AND CourseID = $CourseID";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['error'] = "You are already registered for that class.";
	header('Register_For_Class.php');
	exit();
}

//Insert student into the enrollment table for the course
$query = "INSERT INTO Enrollment (CourseID, StudentID) VALUES ('$CourseID','$StudentID')";
if(!mysqli_query($link,$query))
{
	$_SESSION['error'] = "Could not register for course. Please Try again";
	header('Register_For_Class.php');
	exit();
}
else //If the insertion was successful
{
	$query = "UPDATE Courses SET TotalStudents = TotalStudents + 1 WHERE CourseID = $CourseID";
	mysqli_query($link,$query);
}

header('Location: Register_For_Class.php');

?>