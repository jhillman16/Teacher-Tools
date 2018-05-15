<?php
	//unset quizid and assignmentid if no rtake

	$title = "Assignment Description"; include 'header.php';

	include("ConnectDatabase.php"); //Goes through steps of connecting to database
	session_start();
    if(!isset($_COOKIE['AssignmentID']))
    {
        header('Location: myClass.php');
    }

    $studentID = $_SESSION['StudentID'];
    $allowRetake; //0 if can not retake, 1 if can retake
    $fileLink; //The database ID of a related file to the assignment

    $_SESSION['AssignmentID'] = $_COOKIE['AssignmentID'];
	unset($_COOKIE['AssignmentID']);
	$assignmentID = $_SESSION['AssignmentID'];

	$query = "SELECT DISTINCT AssignmentName, Description, Points, AllowRetake, FileLink FROM AssignmentElements x, Assignments y  WHERE x.AssignmentID = $assignmentID AND y.AssignmentID = $assignmentID";
	if($r = mysqli_query($link, $query))
	{
		$row = mysqli_fetch_array($r);
		echo "<h2>" . $row['AssignmentName'] . "</h2><br>";
		echo "<p>" . $row['Description'] . "</p>";
		echo "<p>This assignment is worth " . $row['Points'] . " points.</p>";
		$allowRetake = $row['AllowRetake'];
		$fileLink = $row['FileLink'];
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}

	$query = "SELECT Score FROM Performance WHERE AssignmentID = $assignmentID AND StudentID = $studentID";
	if($r = mysqli_query($link, $query))
	{
		if(mysqli_num_rows($r) > 0 && $allowRetake == 0)
		{
			unset($_SESSION['AssignmentID']);
			$row = mysqli_fetch_array($r);
			echo "<p>You have already done this assignment. Retakes for this assignment are not allowed.</p><br>";
			echo "<p>You have recieved the score of " . $row['Score'] * 100 . "% for this assignment.</p>";
		}
		else
		{
			echo "Follow this link to access files related to this assignment: <button onclick='" . $fileLink . "'>Related Files</button>";
		}
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}

	

	include 'footer.php';
?>