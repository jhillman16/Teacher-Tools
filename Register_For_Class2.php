<html>

<script>
function myFunction()
{
    var txt;
    if (confirm("Are you sure you want to register for this class?") == true) {
        txt = "You pressed OK!";
	window.location = 'Register_For_Class.php';
    } else {
        txt = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>

<?php

session_start();
if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
	header('Location: StudentLogin.htm');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

// Escape user inputs for security
$SearchText = $_POST['SearchText'];

// attempt get teacher info
$query = "SELECT t.FirstName, t.LastName, t.TeacherID, c.Name, c.CourseID, c.Description
	 FROM TeacherUser t
	 INNER JOIN Courses c ON t.TeacherID = c.TeacherID
	 WHERE t.FirstName LIKE '%" . $SearchText . "%' OR t.LastName LIKE '%" . $SearchText . 
	       "%' OR c.Name LIKE '%" . $SearchText . "%' ";

if($r=mysqli_query($link, $query))
{
	echo "<table border='1'><thead><tr><th>Class Name</th><th>Teacher Name</th><th>Description</th><th>Register</th></tr></thead>";
	while($row=mysqli_fetch_array($r))
	{
		echo "<tr>";    
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
		echo "<td><details><summary>Description</summary><p>" . $row['Description'] . "</p></details></td>";
		echo "<td><button onclick='myFunction()'>Register</button></td>";
		//echo "<td> <input type= 'button' name= 'submit' onClick='RegisterClick(" . $row['CourseID'] . ") value='Register'> </td>";
		echo "</tr>";
	}
	echo "</table>";
}

function RegisterClick($id)
{
header('Location: Register_For_Class.php');
	$StudentID = $_SESSION['StudentID'];
	$query2 = "INSERT INTO Enrollment (CourseID, StudentID) VALUES ('$id','$StudentID')";
	mysqli_query($link,$query2);
}

?>

</html>