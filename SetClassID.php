<?php

session_start();
if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
	header('Location: default.php');
}

$_SESSION['CourseID'] = $_COOKIE['CourseID'];
$_SESSION['CourseName'] = $_COOKIE['CourseName'];

unset($_COOKIE['CourseID']);
unset($_COOKIE['CourseName']);

header('Location: myClass.php');

?>