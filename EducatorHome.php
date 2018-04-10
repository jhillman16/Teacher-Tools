<?php $title = "Home Page"; include 'header.php';?>

<?php
if(isset($_SESSION['TeacherID']))
{
	echo "<p>Welcome to Instructor's Page</p>";
	echo "<p>Click My files to upload any files for your classes.</p>";
	echo "<p>Click Create Class to build class on any subject.</p>";
	echo "<p>Click My Students to view your students.</p>";
	
	echo "<p><img src=\"images/class.jpg\" alt=\"Image\" /></p>";
}
else
{
	header('Location: Login.php');
}
?>

<?php include 'footer.php';?>
