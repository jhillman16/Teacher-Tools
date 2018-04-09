<?php $title = "My Assignments"; include 'header.php';?>

<script>
//Parameter course is the course ID associated with the class button that is clicked on.
//Sends to php script to set the course ID cookie for the user
function myFunction(AssignmentID)
{
    document.cookie = "AssignmentID=" + AssignmentID;
    window.location = 'QuizDesc.php';
}
</script>

<?php
    session_start();
    if(!isset($_SESSION['CourseID']))
    {
        header('Location: myClass.php');
    }

include("ConnectDatabase.php"); //Goes through steps of connecting to database

if( isset($_SESSION['StudentID']) )
{
	$CourseID = $_SESSION['CourseID'];
	$query = "SELECT AssignmentID, AssignmentName, DueDate, CourseID FROM Assignments WHERE CourseID = $CourseID";

	echo "<h2> Quizzes </h2>";

	$r=mysqli_query($link, $query);
	if(mysqli_num_rows($r) > 0)
	{
		while($row=mysqli_fetch_array($r))
		{
			echo "<button class='button' onclick='myFunction(" . $row['AssignmentID'] . ")'>"
			 . $row['AssignmentName'] . ", Due Date: " . $row['DueDate'] . "</button><br><br>";
		}
	}
}

include 'footer.php';

?>
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
			echo "<button class='button' onclick='myFunction(" . $row['CourseID'] . ",\"" . $row['Name'] . "\")'>"
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
			echo "<button class='button' onclick='myFunction(" . $row['CourseID'] . ",\"" . $row['Name'] . "\")'>"
			 . $row['Name'] . ", " . $row['FirstName'] . " " . $row['LastName'] . ", "
			 . $row['NumSeats'] . " seats </button><br><br>";
		}
	}
}


?>