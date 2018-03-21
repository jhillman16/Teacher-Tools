<?php
	//Add to database: allow retake boolean, num question points
	
	//go back to quiz creation and add place to add number of points for question, and ask if can retake at beginning
	//say the better score of the two will be taken
	//unset assignmentid and quizid session variables when done

	//QuizTestGrade.php: 
	//if can retake, query for the score, and insert the larger of the two scores

	$title = "Quiz Grade"; include 'header.php';

	include("ConnectDatabase.php"); //Goes through steps of connecting to database
	session_start();
    if(!isset($_SESSION['QuizID']))
    {
        header('Location: myAssignments.php');
    }

	$quizID = $_SESSION['QuizID'];
	$assignmentID = $_SESSION['AssignmentID'];
	$studentID = $_SESSION['StudentID'];
	$dbScore = 0.0; //Student's score from the database

	$query = "SELECT Score FROM Performance WHERE AssignmentID = $assignmentID AND StudentID = $studentID";
	if($r = mysqli_query($link, $query) )
	{
		if(mysqli_num_rows($r) > 0)
		{
			$row = mysqli_fetch_array($r);
			$dbScore = $row['Score'];
		}
	}
	else
	{
		echo "ERROR1: Not able to execute $sql. " . mysqli_error($link);
	}

	$query = "SELECT Response, Points FROM Response WHERE quizID = $quizID AND IsCorrect = 1";
	if($r = mysqli_query($link, $query))
	{
		$questionNum = 0;
		$totalPoints = 0;
		$totalCorrect = 0;

		while($ansRow=mysqli_fetch_array($r))
		{
				$questionID = 'q' . $questionNum;

				$userAnswer = $_POST["$questionID"];
				$realAnswer = $ansRow['Response'];
				$questionPoints = $ansRow['Points'];

				$totalCorrect = $totalCorrect + $questionPoints;
				if($userAnswer == $realAnswer)
				{
					$totalCorrect = $totalCorrect + $questionPoints;
				}
				
				$questionNum++;
		}

		$score = $totalCorrect / $totalPoints;
		if($dbScore > $score)
			$score = $dbScore;

		$query = "INSERT INTO Performance (StudentID, Score, AssignmentID) VALUES ('$studentID', '$score', '$assignmentID')";
		if(mysqli_query($link, $query))
		{
		    echo "<h1>Grading complete. You have recieved a score of " . $score . " on this quiz.<h1>";
		}
		else
		{
		    echo "ERROR2: Not able to execute $sql. " . mysqli_error($link);
		}
	}

	unset($_SESSION['QuizID']);
	unset($_SESSION['AssignmentID']);

	include 'footer.php';
?>