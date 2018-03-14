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
		<li><a href="StudentLogin.php">Student Login</a></li>
		<li><a href="EducatorLogin.php">Educator Login</a></li>
	<?php
	if(isset($_SESSION['FirstName']))
	{
		echo'<li><a href="CreateCourse.php">Create Course</a></li>';
		echo'<li><a href="Discussion.php">Discussion</a></li>';
		echo'<li><a href="Signup.php">Signup</a></li>';
		echo'<li><a href="myClass.php">My Class</a></li>';
	}
	?>
	</ul>
</nav>

<section>
<header>
	<h1><?php echo htmlentities($title) ?></h1>
</header>

<div id="content">