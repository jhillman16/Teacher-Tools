<?php session_start(); $titleCourse = $_SESSION['CourseName']; $title = "Course Home $titleCourse"; include 'header.php';

if (!isset($_SESSION['StudentID']) && !isset($_SESSION['TeacherID']))
{
	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$CourseID = $_SESSION['CourseID'];
$query = "SELECT * FROM Courses c LEFT JOIN TeacherUser t ON t.TeacherID = c.TeacherID WHERE CourseID = $CourseID";

if($r=mysqli_query($link, $query))
{
	$row=mysqli_fetch_array($r);
	echo "<h2>" . $_SESSION['CourseName'] . "</h2><br>";
	echo "<p>";
	echo $row['Description'] . "<br>";
	echo "Teacher: " . $row['FirstName'] . " " . $row['LastName'] . " (" . $row['Email'] . ")<br>";
	echo "Total Students: " . $row['EnrollmentNumber'] . "<br>";
	echo "</p>";
}

include 'footer.php';
?>