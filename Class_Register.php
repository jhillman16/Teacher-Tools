<?php

session_start();
include("ConnectDatabase.php"); //Goes through steps of connecting to database

// Escape user inputs for security
$firstName	= mysqli_real_escape_string($link, $_REQUEST['ProfFirstName']);
$LastName	= mysqli_real_escape_string($link, $_REQUEST['ProfLastName']);
$studentId = $_SESSION['StudentID'];

// attempt get teacher info
$query = "SELECT Name,NumSeats-TotalStudents AS AvailableSeats FROM Courses WHERE teacherId = TeacherID";

$result = mysqli_query($link, $query); 

// close connection
mysqli_close($link);

header('Location: myClass.html');

?>