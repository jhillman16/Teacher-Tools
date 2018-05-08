<?php 

include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();

if(!isset($_SESSION['FirstName']))
{
    header('Location: Logout.php');
}

$assignID = $_COOKIE['$AssignmentID'];

$query = "SELECT * FROM Quiz WHERE '$assignID' = AssignmentID";

$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)>0)
{
	header('Location: AssignentDesc.php');
}
else
{
	header('Location: AssignmentDesc.php');
}

?>