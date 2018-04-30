<?php $title = "Quiz"; include 'header.php';?>

<?php
    session_start();
    if(!isset($_SESSION['AssignmentID']))
    {
        header('Location: myAssignments.php');
    }

include("ConnectDatabase.php"); //Goes through steps of connecting to database
?>

<body>

<form action='QuizTestGrade.php' method='post'>
<?php
	$QuizID = $_SESSION['QuizID'];

	$QuestionQuery = "SELECT Question, QuestionID FROM Question WHERE QuizID = $QuizID";
	
	if($r1=mysqli_query($link, $QuestionQuery))
	{	
		while($QuestionRow=mysqli_fetch_array($r1))
		{
			echo "<p class='question'>" . ($QuestionRow['QuestionID'] +1) . ". " . $QuestionRow['Question'] . "</p>";
			echo "<ul class='answers'>";

			$QuestionID = $QuestionRow['QuestionID'];
			$GroupName = 'q' . $QuestionRow['QuestionID']; //These radio buttons for the answers will be grouped by the question number.
			$Letter = 'a';

			$ResponseQuery = "SELECT ResponseID, IsCorrect, Response FROM Response WHERE QuizID = $QuizID AND QuestionID = $QuestionID";
			$r2=mysqli_query($link, $ResponseQuery);
			
			while($ResponseRow=mysqli_fetch_array($r2))
			{
				$AnsID = $GroupName . $Letter;
				echo '<input type="radio" name="' . $GroupName . '" value="' . $ResponseRow["Response"] . '" id="' . $AnsID . '" ><label for="' . $AnsID . '">' . $ResponseRow["Response"] . '</label><br/>';
				$Letter++;
			}

				echo "</ul>";
		}
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}
?>
<input type="submit">
</form>

</body>
<?php include 'footer.php';?>