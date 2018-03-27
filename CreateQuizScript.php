<?php 

include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();

$QuizName = $_POST['quizName'];
$QuizDesc = $_POST['quizDescription'];
$CategoryName = $_POST['categoryName'];
$DueDate = $_POST['dueDate'];
$Retake;
$TeacherID = $_SESSION['TeacherID'];
$CourseID = $_SESSION['CourseID'];
$CategoryID;
$AssignmentID;
$DueDate=date("Y-m-d H:i:s",strtotime($DueDate));

if($_POST['retake'] == "yes")
{
    $Retake = 1;
}
else
{
    $Retake = 0;
}

//This chunk of code checks the Category table to get CategoryID, if it exists
$query = "SELECT CategoryID FROM Category WHERE CourseID = $CourseID AND CategoryName = '$CategoryName'";
if($r = mysqli_query($link, $query))
{
    if(mysqli_num_rows($r)==0)
    {
        $_SESSION['Error'] = 'That category does not exist.';
        header('Location: CreateQuiz.php');
    }
    else
    {
        $row=mysqli_fetch_array($r);
        $CategoryID = $row['CategoryID'];
    }
}
else
{
    echo "ERROR1: Not able to execute $sql. " . mysqli_error($link);
}

$query = "SELECT AssignmentName FROM Assignments WHERE CourseID = '$CourseID' AND AssignmentName = '$QuizName'";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['Error'] = 'This quiz name already exists'; //Error message to display
	header('Location: CreateQuiz.php');
        exit();
}

//This chunk of code inserts the quiz into the Assignments table and gets the AssignmentID
$query = "INSERT INTO Assignments (CourseID, AssignmentName, DueDate, CategoryID) 
            VALUES ('$CourseID', '$QuizName', '$DueDate', '$CategoryID')";
if(mysqli_query($link, $query))
{
    $AssignmentID = mysqli_insert_id($link);
}
else
{
    echo "ERROR2: Not able to execute $sql. " . mysqli_error($link);
}

//This chunk of code inserts the quiz into the Quiz table and redirects user to the create question page
$query = "INSERT INTO Quiz (AssignmentID, Description, QuizName, AllowRetake) 
            VALUES ('$AssignmentID', '$QuizDesc', '$QuizName', '$Retake')";
if(mysqli_query($link, $query))
{
    $_SESSION['QuizID'] = mysqli_insert_id($link);
    header('Location: CreateQuestion.php');
}
else
{
    echo "ERROR3: Not able to execute $sql. " . mysqli_error($link);
}

?>
