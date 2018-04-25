<?php $title = "Home Page"; include 'header.php';?>

<?php
if(isset($_SESSION['StudentID']))
{
	echo '<p>Welcome to Student\'s Page</p>';
	echo '<p>Click "My Classes" to view your classes.</p>';
	echo '<p>Click "My Grades" to view your progress report card. </p>';
	echo '<p>Click "My Assignments" to view you tests, labs, homeworks and more. </p>';
}
else if (isset($_SESSION['TeacherID']))
{
	echo '<script>';
	echo 'document.location("EducatorHome.php");';
	echo '</script>';
}
else
{
	header('Location: Login.php');
}
?>
	
<?php include 'footer.php';?>