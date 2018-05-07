<?php include 'header.php'; include 'checkSession.php';
include("ConnectDatabase.php"); //Goes through steps of connecting to database
?>


<?php
 /*session_start();
if( isset( $_SESSION['n'] ) ) {
      $_SESSION['n'] += 1;
   }else {
      $_SESSION['n'] = 0;
   }*/

$QuestionQuery = "SELECT UserName FROM StudentsUser WHERE StudentID IN(SELECT StudentID FROM `Enrollment` WHERE CourseID = 1)";


$r1=mysqli_query($link, $QuestionQuery);
if(! $r1 ) {
	die('Could not get data: ' . mysql_error());
}
while($QuestionRow=mysqli_fetch_array($r1))
{
echo "

<p> Student: {$QuestionRow[0]}</p>  

";
}









?>

<?php  

include 'footer.php';?>