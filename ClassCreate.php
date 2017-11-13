<?php

session_start();
include("ConnectDatabase.php"); //Goes through steps of connecting to database

// Escape user inputs for security
$CourseName	= mysqli_real_escape_string($link, $_REQUEST['courseName']);
$NumberSeats	= mysqli_real_escape_string($link, $_REQUEST['numSeats']);
$Desc	= mysqli_real_escape_string($link, $_REQUEST['description']);
$teachId = $_SESSION['TeacherID'];

echo $teachId;

// attempt get teacher info
$query = "INSERT INTO Courses (Name,TeacherID,Description,NumSeats) VALUES('$CourseName','$teachId','$Desc','$NumberSeats')";

$result = mysqli_query($link, $query); 

// close connection
mysqli_close($link);

header('Location: myClass.html');

?>