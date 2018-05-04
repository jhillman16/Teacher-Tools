<?php $title = "Quiz Grade"; include 'header.php'; include 'checkSession.php';

include("ConnectDatabase.php"); //Goes through steps of connecting to database

if(!isset($_SESSION['QuizID']))
{
	header_remove();
	echo '<script>';
	echo 'window.location.replace("myAssignments.php");';
	echo '</script>';
}

$courseID = $_SESSION['CourseID'];
$quizID = $_SESSION['QuizID'];
$assignmentID = $_SESSION['AssignmentID'];
$studentID = $_SESSION['StudentID'];
$dbScore = -1; //Student's score from the database

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

$query = "SELECT DISTINCT r.Response, q.Points FROM Response r JOIN Question q ON r.QuizID = q.QuizID WHERE r.QuizID = $quizID AND r.IsCorrect = 1";

//$query = "SELECT Response, Points FROM Response WHERE quizID = $quizID AND IsCorrect = 1";
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

			$totalPoints = $totalPoints + $questionPoints;
			if($userAnswer == $realAnswer)
			{
				$totalCorrect = $totalCorrect + $questionPoints;
			}
			
			$questionNum++;
	}

	ini_set("precision", 4); //Sets the precision of a float to four decimals, will multiply by 100 later
	$score = $totalCorrect / $totalPoints;
	if($dbScore > $score)
		$score = $dbScore;
	$score = $score * 100;

	if($dbScore == -1)
		$query = "INSERT INTO Performance (StudentID, Score, AssignmentID, CourseID) VALUES ('$studentID', '$score', '$assignmentID', '$courseID')";
	else
		$query = "UPDATE Performance SET Score = $score WHERE StudentID = $studentID AND AssignmentID = $assignmentID";

	if(mysqli_query($link, $query))
	{
	    echo "<p>Grading complete. You have recieved a score of " . $score . "% on this quiz.<p>";
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