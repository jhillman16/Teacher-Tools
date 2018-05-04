<?php 

include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();

$Name = $_POST['categoryName'];
$Percentage = $_POST['categoryPercentage'];
$CourseID = $_SESSION['CourseID'];


$query = "INSERT INTO Category (CategoryName, Percentage, CourseID) 
            VALUES ('$Name', '$Percentage', '$CourseID')";

if(mysqli_query($link, $query))
{
	header('Location: CreateCategory.php');
}
else
{
	echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

?>