<?php

session_start();
if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
	header('Location: Login.php');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$count = $_COOKIE['QuizCounter'];
$score = $_COOKIE['QuizScore'];
$quiz = $_SESSION['QuizName'.$count];
$id = $_COOKIE['ViewStudent']; 

$query = "UPDATE Performance SET Score = $score WHERE AssignmentID = $quiz AND StudentID = $id";

$letter = '';

if($score < 60)
{
	$letter = 'F';
}
else if($score < 70)
{
	$letter = 'D';
}
else if($score < 80)
{
	$letter = 'C';
}
else if($score < 90)
{
	$letter = 'B';
}
else
{
	$letter = 'A';
}


mysqli_query($link,$query);

$query = "UPDATE Performance SET LetterGrade = $letter WHERE AssignmentID = $quiz AND StudentID = $id";


header('Location: ViewGrades.php');

?>