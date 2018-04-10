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


$query = "SELECT Score FROM Performance WHERE StudentID = '$id'";

$grade = '';



$r=mysqli_query($link, $query);

while($row=mysqli_fetch_array($r))
{
	$grade = $row[0];
	$queryQuiz = "SELECT AssignmentID FROM Performance WHERE StudentID = '$id'";

	if($r2=mysqli_query($link, $queryQuiz))
	{
		if(mysqli_num_rows($r2)==0)
    	{

		}
		else
		{
			$row2=mysqli_fetch_array($r2);
			$assignid = $row2[0];

			$queryName = "SELECT AssignmentName FROM Assignments WHERE AssignmentID = '$assignid'";

			if($r3=mysqli_query($link, $queryName))
			{
				$row3=mysqli_fetch_array($r3);
				echo "$row3[0] &nbsp;";
				echo "<input type='text' placeholder='$grade' name='quizName'> &nbsp;";
				echo "<button onclick='myFunction($grade)' >Submit</button>";
			}

		}

		echo "<br>";

	
	}	
}

if(mysqli_num_rows($r)==0)
{
	echo "<h2>No Quizzes Taken So Far<h2><br>";
}

// if($r=mysqli_query($link, $queryQuiz))
// {
// 	if(mysqli_num_rows($r)==0)
//     {
// 		header('Location: CreateQuiz.php');
// 	}
// 	else
// 	{
// 		$row=mysqli_fetch_array($r);
// 		$assignid = $row[0];

// 		$queryName = "SELECT AssignmentName FROM Assignments WHERE AssignmentID = '$assignid'";

// 		if($r2=mysqli_query($link, $queryName))
// 		{
// 			$row2=mysqli_fetch_array($r2);
// 			echo "<h2>$row2[0] $grade<h2>";
// 		}

// 	}

	
// }

include 'footer.php';
?>