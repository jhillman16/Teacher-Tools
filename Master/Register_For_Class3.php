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

$query = "INSERT INTO Enrollment (CourseID, StudentID) VALUES ('$CourseID','$StudentID')";
mysqli_query($link,$query);

unset($_COOKIE['CourseID']);

header('Location: Register_For_Class.php');

?>