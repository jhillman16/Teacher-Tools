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