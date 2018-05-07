<?php 

include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();

if(!isset($_SESSION['FirstName']))
{
    header('Location: Logout.php');
}

$assignName = $_POST['quizName'];
$assignDesc = $_POST['quizDescription'];
$categoryName = $_POST['categoryName'];
$dueDate = $_POST['dueDate'];
$fileLink = $_POST['fileLink'];
$points = $_POST['points'];
$retake;
$teacherID = $_SESSION['TeacherID'];
$courseID = $_SESSION['CourseID'];
$categoryID;
$assignmentID;
$dueDate=date("Y-m-d H:i:s",strtotime($dueDate));

if($_POST['retake'] == "yes")
{
    $Retake = 1;
}
else
{
    $Retake = 0;
}

//This chunk of code checks the Category table to get CategoryID, if it exists
$query = "SELECT CategoryID FROM Category WHERE CourseID = $courseID AND CategoryName = '$categoryName'";
if($r = mysqli_query($link, $query))
{
    if(mysqli_num_rows($r)==0)
    {
        $_SESSION['Error'] = 'That category does not exist.';
        header('Location: CreateAssignment.php');
        exit();
    }
    else
    {
        $row=mysqli_fetch_array($r);
        $categoryID = $row['CategoryID'];
    }
}
else
{
    echo "ERROR1: Not able to execute $sql. " . mysqli_error($link);
}

$query = "SELECT AssignmentName FROM Assignments WHERE CourseID = '$courseID' AND AssignmentName = '$quizName'";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['Error'] = 'This assignment name already exists'; //Error message to display
	header('Location: CreateAssignment.php');
    exit();
}

//This chunk of code inserts the assignment into the Assignments table and gets the AssignmentID
$query = "INSERT INTO Assignments (CourseID, AssignmentName, DueDate, CategoryID) 
            VALUES ('$courseID', '$assignName', '$dueDate', '$categoryID')";
if(mysqli_query($link, $query))
{
    $assignmentID = mysqli_insert_id($link);
}
else
{
    echo "ERROR2: Not able to execute $sql. " . mysqli_error($link);
}

//This chunk of code inserts everything else about the assignment into the AssignmentElements table
$query = "INSERT INTO AssignmentElements (AssignmentID, Description, Points, AllowRetake, FileLink) 
            VALUES ('$assignmentID', '$assignDesc', '$points', '$retake', '$fileLink')";
if(mysqli_query($link, $query))
{
    $_SESSION['Error'] = 'Assignment created.';
    header('Location: CreateAssignment.php');
}
else
{
    echo "ERROR3: Not able to execute $sql. " . mysqli_error($link);
}

?>
