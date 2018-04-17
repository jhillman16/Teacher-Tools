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

if($row=mysqli_fetch_array($r))
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
			$count = 1;

			while($row2=mysqli_fetch_array($r2))
			{
				$assignid = $row2[0];
				
				$queryName = "SELECT AssignmentName FROM Assignments WHERE AssignmentID = '$assignid'";
	
				
				if($r3=mysqli_query($link, $queryName))
				{
					$ident = "Quiz" .$count;

					$row3=mysqli_fetch_array($r3);
					echo "<div>";
					
					echo "<label><span> $row3[0] </span> &nbsp;";					

					$_SESSION['QuizName'.$count] = $assignid;
					echo "<input type='text' id= '$ident' placeholder='$grade' name='quizName'> &nbsp;";
					echo "<button onclick='myFunction($count)' >Submit</button>";
					echo "</label>";
					echo "</div>";
					echo "<br>";
					echo "<br>";
					$count++;
					
					$row = mysqli_fetch_array($r);
				
					$grade = $row[0];
				}
			}
			

		}
	
	}	
}

if(mysqli_num_rows($r)==0)
{
	echo "<h2>No Quizzes Taken So Far<h2><br>";
}

include 'footer.php';
?>

<script>
function myFunction(count)
{
	document.cookie = "QuizCounter=" + count;
	document.cookie = "QuizScore=" + document.getElementById('Quiz'+count).value;
	window.location = 'UpdateGrades.php';
}
</script>