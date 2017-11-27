<?php 



$QuizName = $_POST['quizname'];
$QuizDesc = $_POST['quizdescription'];
$QuizNum = $_POST['quiznum'];

session_start();

$link = mysqli_connect("localhost", "mmilton1", "mmilton1", "mmilton1DB");

if (!$link) 
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$query = "INSERT INTO Quiz (AssignmentID, Description, Name) 
            VALUES ('1', '$QuizDesc', '$QuizName')";

if(mysqli_query($link, $query))
{
    $_SESSION['QuizID'] = mysqli_insert_id($link);
        echo "Records added successfully " . $_SESSION['QuizID'] . ".";
        header('Location: CreateQuestion.php');
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

?>
