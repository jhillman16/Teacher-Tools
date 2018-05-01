<?php $title = "My Assignments"; include 'header.php';?>

<script>
//Parameter course is the course ID associated with the class button that is clicked on.
//Sends to php script to set the course ID cookie for the user
function myFunction(AssignmentID)
{
    document.cookie = "AssignmentID=" + AssignmentID;
    window.location = 'QuizTest.php';
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
	$StudentID = $_SESSION['StudentID'];
	$query = "SELECT * FROM Assignments WHERE '$CourseID' = CourseID";

	echo "<h2> Quizzes </h2>";

	if($r=mysqli_query($link, $query))
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



<!--
<table>
<thead>
	<tr>
		<th>Quiz</th>
		<th>Due Date</th>
		<th>Points</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td><a href="QuizTest.php">Quiz 1</a></td>
		<td>10/21/2017</td>
		<td>100</td>
	</tr>
</tbody>
</table>
-->