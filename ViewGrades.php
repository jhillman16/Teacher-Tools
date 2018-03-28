<?php
session_start();
$title = "Performance - " . $_COOKIE['StudentName']; 
include 'header.php';
$id = $_COOKIE['ViewStudent']; 

if(!isset($_SESSION['CourseID']))
{
	header('Location: myClass.php');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

echo "<h2>Select a student to view performance in course.<h2><br>";

$query = "SELECT LetterGrade FROM Performance WHERE StudentID = '$id'')";

if($r=mysqli_query($link, $query))
{
	$row=mysqli_fetch_array($r);
	echo ".row['LetterGrade']";
}

include 'footer.php';
?>