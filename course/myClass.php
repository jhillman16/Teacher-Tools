<?php $title = "My Classes"; include 'header.php';?>

	<p>Welcome to Your Class</p>

<?php

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$query = "";

//Attempt to get information about the courses
if( isset($_SESSION['TeacherID']) )
{
	$TeacherID = $_SESSION['TeacherID'];
	$query = "SELECT Name, NumSeats FROM Courses WHERE TeacherID = " . $TeacherID;

	if($r=mysqli_query($link, $query))
	{
		echo "<table>
<thead>
	<tr>
		<th>Class Name</th>
		<th>Number Seats</th>
	</tr>
</thead>
<tbody>\n";
		while($row=mysqli_fetch_array($r))
		{
			echo "\t<tr>\n";    
			echo "\t\t<td>" . $row['Name'] . "</td>\n";
			echo "\t\t<td>" . $row['NumSeats'] . "</td>\n";
			echo "\t</tr>\n";
		}
		echo "</tbody>
</table>";
	}
}
if( isset($_SESSION['StudentID']) )
{
	$StudentID = $_SESSION['StudentID'];
	$query = "SELECT c.Name, c.NumSeats, t.FirstName, t.LastName
		  FROM Courses c, Enrollment e, TeacherUser t
		  WHERE e.StudentID = " . $StudentID . " AND e.CourseID = c.CourseID AND t.TeacherID = c.TeacherID";

	if($r=mysqli_query($link, $query))
	{
		echo "<table><thead><tr><th>Class Name</th><th>Teacher Name</th><th>Number Seats</th></tr></thead><tbody>";
		while($row=mysqli_fetch_array($r))
		{
			echo "<tr>";    
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
			echo "<td>" . $row['NumSeats'] . "</td>";
			echo "</tr>";
		}
		echo "</tbody></table>";
	}
}

if (!isset($_SESSION['StudentID']) && !isset($_SESSION['TeacherID']))
{
	header('Location: default.php');
}


?>


<?php include 'footer.php';?>