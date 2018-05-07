<?php $title = "Home Page"; include 'header.php'; include 'checkSession.php';?>

<?php
if(isset($_SESSION['TeacherID']))
{
	echo '<p>Welcome to Instructor\'s Page</p>';
	echo '<p>Click My files to upload any files for your classes.</p>';
	echo '<p>Click Create Class to build class on any subject.</p>';
	echo '<p>Click My Students to view your students.</p>';

	echo '<p><img src="images/class.jpg" alt="Image" /></p>';
}
else if (isset($_SESSION['StudentID']))
{
	echo '<script>';
	echo 'window.location.replace("StudentHome.php");';
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
