<?php include './course/default.php'; $title = 'Teacher Tools - ' . $testTitle; include 'header.php';?>

<div style="display: none;">
<p>What to display on a home page?</p>

<p>Logged in:</p>
<ul>
	<li>list of classes
	<ul>
		<li>teaching if account flagged educator</li>
		<li>taking if account flagged student</li>
	</ul>
	</li>
</ul>

<p>Logged out:</p>
<ul>
	<li>description of website</li>
	<li>registration/login link</li>
</ul>
</div>

<p style="text-align: center;"><img alt="logo" src="images/logo.png" /></p>

<?php // no need for register button if account is logged in
if(!isset($_SESSION['StudentID']) && (!isset($_SESSION['TeacherID'])))
echo '<p style="text-align: center;"><a href="Signup.php" class="button">Register for your account</a></p>';
?>

<?php
// what I want to do here is display all of a teacher's courses
// so they can click on a course, set a global variable or something, and have all the following work
//   they do only affect the course they clicked on
include_once "ConnectDatabase.php"; //Goes through steps of connecting to database
$sql = "SELECT CourseID, Name FROM Courses WHERE TeacherID = '{$_SESSION['TeacherID']}'";
echo $sql;
if ($result = mysqli_query($link, $sql))
{
	if(mysqli_num_rows($result) > 0)
	{
		echo "<table>";
            echo "<tr>";
				echo "<th>name</th>";
				echo "<th>ID</th>";
            echo "</tr>";
    	while($row = mysqli_fetch_array($result))
		{
            echo "<tr>";
				echo "<td>" . $row['Name'] . "</td>";
				echo '<td><a href="#">' . $row['CourseID'] . '</a></td>';
            echo "</tr>";
		}
		echo "</table>";
	}
}
mysqli_close($link);

// get teacher id, get course id (session variable?), include folder based off course id (course id = folder name?)
echo $testContent;
?>

<?php include 'footer.php';?>