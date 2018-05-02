<?php $title = "Quiz"; include 'header.php';

if (!isset($_SESSION['StudentID']) && !isset($_SESSION['TeacherID']))
{
	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}

if(!isset($_SESSION['AssignmentID']))
{
	echo '<script>';
	echo 'window.location.replace("myAssignments.php");';
	echo '</script>';
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database
?>

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

<?php include 'footer.php';?>