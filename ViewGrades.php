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
					$row3=mysqli_fetch_array($r3);
					echo "$row3[0] &nbsp;";
					echo "<input type='text' id= 'Quiz1' placeholder='$grade' name='quizName'> &nbsp;";
					echo "<button onclick='myFunction()' >Submit</button>";
					echo "<br>";
					echo "<br>";
				    $count++;
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
function myFunction()
{
	window.alert(document.getElementById('Quiz1').value);
}
</script>