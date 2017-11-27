<?php 

session_start();

$Question = $_POST['question'];
$response0 = $_POST['ans0'];
$response1 = $_POST['ans1'];
$response2 = $_POST['ans2'];
$response3 = $_POST['ans3'];

$response0isCorrect = $_POST['is0'];
$response1isCorrect = $_POST['is1'];
$response2isCorrect = $_POST['is2'];
$response3isCorrect = $_POST['is3'];

$canContinue = $_POST['cont'];

echo $canContinue;




if(!isset($_SESSION['QuestionNum']))
{
	$_SESSION['QuestionNum'] = '0';
}

$QuestionIDNum = $_SESSION['QuestionNum'];

$link = mysqli_connect("localhost", "mmilton1", "mmilton1", "mmilton1DB");

if (!$link) 
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$CurrentQuizID = $_SESSION['QuizID'];

$questionQuery = "INSERT INTO Question (Question, QuizID, QuestionID) 
            VALUES ('$Question', '$CurrentQuizID', '$QuestionIDNum')";


$responseQuery0 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 0, '$response0isCorrect', '$response0')";   

$responseQuery1 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 1, '$response1isCorrect', '$response1')"; 

$responseQuery2 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 2, '$response2isCorrect', '$response2')"; 

$responseQuery3 = "INSERT INTO Response (QuizID, QuestionID, ResponseID, IsCorrect, Response)
			VALUES ('$CurrentQuizID', '$QuestionIDNum', 3, '$response3isCorrect', '$response3')";    



if(mysqli_query($link, $responseQuery0))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $responseQuery1))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $responseQuery2))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if(mysqli_query($link, $responseQuery3))
{
        echo "Records added successfully " . $_SESSION['ResponseID'] . ".";
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}


if(mysqli_query($link, $questionQuery))
{
        echo "Records added successfully " . $_SESSION['QuestionNum'] . ".";
	
}
else
{
        echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

$QuestionIDNum++;

$_SESSION['QuestionNum'] = $QuestionIDNum;

if($canContinue == 1)
{
    header('Location: CreateQuestion.php');
}
else
{
    header('Location: index.php');
}

?>
