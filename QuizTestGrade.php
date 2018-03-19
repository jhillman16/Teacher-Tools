<?php
	session_start();
    if(!isset($_SESSION['QuizID']))
    {
        header('Location: myAssignments.php');
    }

	include("ConnectDatabase.php"); //Goes through steps of connecting to database

	$integerOne = 1; //Do not know how to make query with integer in php

	$query = "SELECT Response FROM Response WHERE QuizID = $QuizID AND IsCorrect = 2";
	
	if($r = mysqli_query($link, $query))
	{
		$questionNum = 0;
		$correctNum = 1;

		while($ansRow=mysqli_fetch_array($r))
		{
				$questionID = 'q' . $questionNum;

				echo "questionID: ";
				echo $questionID;
				echo "selected: ";
				echo $_POST["$questionID"];
				echo "answer: ";
				echo $ansRow['Response'];
				echo "<br>";

				$questionNum++;
		}	
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}

?>