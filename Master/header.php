<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
if(basename($_SERVER['REQUEST_URI']) != 'default.php')
	echo "<title>Teacher Tools - " . htmlentities($title) . "</title>";
else
	echo "<title>Teacher Tools</title>";
?>
	<link rel="stylesheet" type="text/css" href="normalize.css" />
	<link rel="stylesheet" type="text/css" href="default-css.css" />
	<meta charset="UTF-8" />
</head>
<body>

<main>

<nav>
	<p id="logo"><img alt="Teacher Tools logo" src="images/logo.png" /></p>

	<?php
	if(isset($_SESSION['FirstName']))
		echo"<p>Welcome, " . $_SESSION['FirstName'] . "</p>";
	?>

	<ul>
		<li><a href="default.php">Home</a></li>
		<li><a href="About.php">About</a></li>

	<?php
	if(!isset($_SESSION['FirstName']))
	{
		echo'<li><a href="StudentLogin.php">Student Login</a></li>';
		echo'<li><a href="EducatorLogin.php">Educator Login</a></li>';
		echo'<li><a href="Signup.php">Signup</a></li>';
	}
	?>

	<?php
	if(isset($_SESSION['StudentID']))
	{
		echo'<li><a href="myClass.php">My Class</a></li>';
		echo'<li><a href="myAssignments.php">My Assignments</a></li>';
		echo'<li><a href="Register_For_Class.php">Register For Class</a></li>';
		echo'<li><a href="Discussion.php">Discussion</a></li>';

	}
	else if(isset($_SESSION['TeacherID']))
	{
		echo'<li><a href="CreateCourse.php">Create a Course</a></li>';
		echo'<li><a href="UploadFiles.php">Upload Files</a></li>';
		echo'<li><a href="myStudents.php">My Students</a></li>';
		echo'<li><a href="CreateQuiz.php">Create a Quiz</a></li>';
		echo'<li><a href="myClass.php">My Class</a></li>';

	}
	?>

	<?php
	if(isset($_SESSION['FirstName']))
	{
		echo'<li><a href="Logout.php">Logout</a></li>';
	}
	?>

	</ul>
</nav>

<section>
<header>
	<h1><?php echo htmlentities($title) ?></h1>
</header>

<div id="content">