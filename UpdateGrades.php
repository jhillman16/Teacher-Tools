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

echo $count . '<br>';
echo $score . '<br>';
echo $quiz . '<br>';
echo $id;

//$query = "UPDATE PERFORMANCE SET Score = '$score' WHERE AssignmentID = $quiz AND StudentID = $id";

//$result = mysqli_query($link,$query);

//header('ViewGrades.php');

?>