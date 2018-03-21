<?php
	//unset quizid and assignmentid if no rtake

	$title = "Quiz Description"; include 'header.php';

	include("ConnectDatabase.php"); //Goes through steps of connecting to database
	session_start();
    if(!isset($_COOKIE['AssignmentID']))
    {
        header('Location: myAssignments.php');
    }

    $studentID = $_SESSION['StudentID'];
    $allowRetake; //0 if can not retake, 1 if can retake

    $_SESSION['AssignmentID'] = $_COOKIE['AssignmentID'];
	unset($_COOKIE['AssignmentID']);
	$assignmentID = $_SESSION['AssignmentID'];

    $query = "SELECT QuizID FROM Quiz WHERE AssignmentID = $assignmentID";
	$r = mysqli_query($link, $query);
	$row = mysqli_fetch_array($r);
	$_SESSION['QuizID'] = $row['QuizID'];
	$QuizID = $_SESSION['QuizID'];

	$query = "SELECT QuizName, Description, AllowRetake FROM Quiz WHERE AssignmentID = $assignmentID";
	if($r = mysqli_query($link, $query))
	{
		$row = mysqli_fetch_array($r);
		echo "<h2>" . $row['QuizName'] . "</h2><br>";
		echo "<p>" . $row['Description'] . "</p><br>";
		$allowRetake = $row['AllowRetake'];
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
			unset($_SESSION['QuizID']);
			unset($_SESSION['AssignmentID']);
			$row = mysqli_fetch_array($r);
			echo "<h1>You have already taken this quiz. Retakes for this quiz are not allowed.</h1>";
			echo "You have recieved the score of " . $row['Score'] . " for this quiz";
		}
		else
		{
			echo "<button onclick=\"location.href='QuizTest.php'\">Take Quiz</button>";
		}
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}

	include 'footer.php';
?>