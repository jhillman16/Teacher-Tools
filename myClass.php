<?php $title = "My Classes"; include 'header.php';?>

<script>
//Parameter courseID is the course ID associated with the class button that is clicked on, same for courseName.
//Sends to php script to set the CourseID and CourseName cookies for the user
function myFunction(courseID, courseName)
{
    document.cookie = "CourseID=" + courseID;
    document.cookie = "CourseName=" + courseName;
    window.location = 'SetClassID.php';
}
</script> 

<p>Your Classes</p>

<?php

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$query = "";

//Attempt to get information about the courses
if( isset($_SESSION['TeacherID']) )
{
	$TeacherID = $_SESSION['TeacherID'];
	$query = "SELECT Name, NumSeats, CourseID FROM Courses WHERE TeacherID = " . $TeacherID;

	if($r=mysqli_query($link, $query))
	{
		while($row=mysqli_fetch_array($r))
		{
			echo "<button class='button' onclick='myFunction(" . $row['CourseID'] . ", " . $row['Name'] . ")'>"
			 . $row['Name'] . ", " . $row['NumSeats'] . " seats </button><br><br>";
		}
	}
}
if( isset($_SESSION['StudentID']) )
{
	$StudentID = $_SESSION['StudentID'];
	$query = "SELECT c.Name, c.NumSeats, c.CourseID, t.FirstName, t.LastName
		  FROM Courses c, Enrollment e, TeacherUser t
		  WHERE e.StudentID = " . $StudentID . " AND e.CourseID = c.CourseID AND t.TeacherID = c.TeacherID";

	if($r=mysqli_query($link, $query))
	{
		while($row=mysqli_fetch_array($r))
		{
			echo "<button class='button' onclick='myFunction(" . $row['CourseID'] . ", " . $row['Name'] . ")'>"
			 . $row['Name'] . ", " . $row['FirstName'] . " " . $row['LastName'] . ", "
			 . $row['NumSeats'] . " seats </button><br><br>";
		}
	}
}


?>


<?php include 'footer.php';?>





<!--

echo "<tr>";    
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
echo "<td><details><summary>Description</summary><p>" . $row['Description'] . "</p></details></td>";
echo "<td><button onclick='myFunction(" . $row['CourseID'] . ")'>Register</button></td>";
echo "</tr>";


echo "<tr>";    
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
echo "<td>" . $row['NumSeats'] . "</td>";
echo "</tr>";

echo "<tr> <button onclick='myFunction(" . $row['CourseID'] . ")'> <td>" . $row['Name'] . 
"</td><td>" . $row['FirstName'] . " " . $row['LastName'] . "</td><td>" . $row['NumSeats'] . "</td></button></tr>";



echo "<button onclick='myFunction(" . $row['CourseID'] . ")'>" . $row['Name'] . "   " . $row['FirstName'] . " " . $row['LastName'] . "   " . $row['NumSeats'] . " seats </button>";
-->

