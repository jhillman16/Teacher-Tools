<?php $title = "Home Page"; include 'header.php'; include 'checkSession.php';?>

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
	echo 'window.location.replace("EducatorHome.php");';
	echo '</script>';
}
else
{
	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}
?>
	
<?php include 'footer.php';?>