<?php

include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();

$points = $_POST['points'];
$Question = $_POST['question'];
$response0 = $_POST['ans0'];
$response1 = $_POST['ans1'];
$response2 = $_POST['ans2'];
$response3 = $_POST['ans3'];

$response0isCorrect = $_POST['is0'];
$response1isCorrect = $_POST['is1'];
$response2isCorrect = $_POST['is2'];
$response3isCorrect = $_POST['is3'];

$canContinue = $_POST['cont'];

if($Question == '')
{
	if($canContinue != 0)
	{
		unset($_SESSION['QuestionNum']);
		header('Location: EducatorHome.php');
	}
	else
	{
		$_SESSION['Error'] = 'Need to enter a question';
		header('Location: CreateQuestion.php');
	}
}
if( ($response0isCorrect==0 && $response1isCorrect==0) && ($response2isCorrect==0 && $response3isCorrect==0) )
{
	$_SESSION['Error'] = 'Need to select a correct answer';
}

if(!isset($_SESSION['QuestionNum']))
{
	$_SESSION['QuestionNum'] = '0';
}

$QuestionIDNum = $_SESSION['QuestionNum'];

$CurrentQuizID = $_SESSION['QuizID'];

$questionQuery = "INSERT INTO Question (Question, QuizID, QuestionID, Points) 
            VALUES ('$Question', '$CurrentQuizID', '$QuestionIDNum', '$points')";


$responseQuery0 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 0, '$response0isCorrect', '$response0')";   

$responseQuery1 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 1, '$response1isCorrect', '$response1')"; 

$responseQuery2 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 2, '$response2isCorrect', '$response2')"; 

$responseQuery3 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 3, '$response3isCorrect', '$response3')";    



if(mysqli_query($link, $responseQuery0))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "$CurrentQuizID ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $responseQuery1))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $responseQuery2))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $responseQuery3))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}


if(mysqli_query($link, $questionQuery))
{
        echo "Records added successfully " . $_SESSION['QuestionNum'] . ".";	
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

$QuestionIDNum++;

$_SESSION['QuestionNum'] = $QuestionIDNum;

if($canContinue == 0)
{
    header('Location: CreateQuestion.php');
}
else
{
    unset($_SESSION['QuestionNum']);
    header('Location: EducatorHome.php');
}

?>
