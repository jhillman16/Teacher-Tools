<?php
session_start(); $titleCourse = $_SESSION['CourseName']; $title = "Course Home $titleCourse";
include 'header.php';
include 'checkSession.php';

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
?>

<ul>
	<li><a href="myAssignments.php">My Assignments</a></li>
</ul>

<p><a href="myAssignments.php" class="button">Select a different course</a></p>

<?php include 'footer.php';?>