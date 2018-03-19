<?php
	session_start();
    if(!isset($_SESSION['QuizID']))
    {
        header('Location: myAssignments.php');
    }

	include("ConnectDatabase.php"); //Goes through steps of connecting to database

	$questionNum = 0;
	$correctNum = 1;

	$query = "SELECT Response FROM Response WHERE QuizID = $QuizID AND IsCorrect = '1'";
	$r = mysqli_query($link, $query);

	while($ansRow=mysqli_fetch_array($r))
	{
			$questionID = 'q' . $questionNum;

			echo "questionID: "
			echo $questionID;
			echo "selected: ";
			echo $_POST["$questionID"];
			echo "answer: ";
			echo $ansRow['Response'];
			echo "<br>";

			$questionNum++;
	}
echo mysqli_error($link);
	echo 'hey';

?>