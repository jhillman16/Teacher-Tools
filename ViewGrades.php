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

$grade = '';

if($r=mysqli_query($link, $query))
{
	if(mysqli_num_rows($r)==0)
    {
		header('Location: CreateQuiz.php');
	}
	else
	{
		$row=mysqli_fetch_array($r);
		$grade = $row[0];
	}
	
}

$queryQuiz = "SELECT AssignmentID FROM Performance WHERE StudentID = '$id'";


if($r=mysqli_query($link, $queryQuiz))
{
	if(mysqli_num_rows($r)==0)
    {
		header('Location: CreateQuiz.php');
	}
	else
	{
		$row=mysqli_fetch_array($r);
		$assignid = $row[0];

		$queryName = "SELECT AssignmentName FROM Assignments WHERE AssignmentID = '$assignid'";

		if($r2=mysqli_query($link, $queryName))
		{
			$row2=mysqli_fetch_array($r2);
			echo "<h2>$row2[0]<h2>";
			echo "<h2>$grade<h2><br>";
		}

	}

	
}

include 'footer.php';
?>