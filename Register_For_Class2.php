<?php $title = "Register for a Class"; include 'header.php'; ?>

<script>

//Parameter course is the course ID associated with the "Register" button that is clicked on.
//Sends to php scriptto enter user for that class if user confirms
function myFunction(course)
{
    var txt;
    if (confirm("Are you sure you want to register for this class?") == true)
    {
        txt = "You pressed OK!";
	document.cookie = "CourseID=" + course;
	window.location = 'Register_For_Class3.php';
    }
    else
    {
        txt = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = txt;
}

</script> 

<section>
<header> 
    <h1> Register For a Course</h1>
</header>

<div id="content">

<?php

session_start();

if(!isset($_SESSION['FirstName']))
{
	$_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
	header('Location: StudentLogin.htm');
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

//Get the string from the search box
$SearchText = $_POST['SearchText'];

//Attempt to get information about the course
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
		echo "<td><button onclick='myFunction(" . $row['CourseID'] . ")'>Register</button></td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>

<?php include 'footer.php';?>