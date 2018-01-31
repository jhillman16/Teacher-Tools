<?php

session_start();
if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
	header('Location: default.php');
}

$_SESSION['CourseID'] = $_COOKIE['CourseID'];

unset($_COOKIE['CourseID']);

header('Location: myClass.php');

?>