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

echo $count;
echo $score;
echo $quiz;


?>