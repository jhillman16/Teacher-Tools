<?php 

session_start();

$Question = $_POST['question'];


if(!isset($_SESSION['QuestionNum']))
{
	$_SESSION['QuestionNum'] = '1';
}

$QuestionIDNum = $_SESSION['QuestionNum'];

$link = mysqli_connect("localhost", "mmilton1", "mmilton1", "mmilton1DB");

if (!$link) 
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$CurrentQuizID = $_SESSION['QuizID'];

$query = "INSERT INTO Question (Question, QuizID, QuestionID) 
            VALUES ('$Question', '$CurrentQuizID', '$QuestionIDNum')";


if(mysqli_query($link, $query))
{
        echo "Records added successfully " . $_SESSION['QuestionNum'] . ".";
	header('Location: CreateQuestion.htm');
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

$QuestionIDNum++;

echo "$QuestionIDNum";

$_SESSION['QuestionNum'] = $QuestionIDNum;

?>
