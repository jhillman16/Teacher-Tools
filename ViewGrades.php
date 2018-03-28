<?php
session_start();
$title = "Performance - " . $_COOKIE['StudentName']; 
include 'header.php';
$id = $_COOKIE['ViewStudent']; 

if(!isset($_SESSION['CourseID']))
{
	header('Location: myClass.php');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

echo "<h2>Select a student to view performance in course.<h2><br>";

$query = "SELECT LetterGrade FROM Performance WHERE StudentID = '$id'";

if($r=mysqli_query($link, $query))
{
	if(mysqli_num_rows($r)==0)
    {
		header('Location: CreateQuiz.php');
	}
	else
	{
		$row=mysqli_fetch_array($r);
		echo "<h2>'.row['LetterGrade']'<h2><br>";
	}

	
}

include 'footer.php';
?>