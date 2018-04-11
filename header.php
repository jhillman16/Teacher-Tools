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
	<!-- for accordion menu -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
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
		<li>
			<span id="accordion">
				<div id="accordionOne" class="accordion-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					Site Related Links
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="accordionOne" data-parent="#accordion">
					<a href="default.php">Home</a>
					<a href="About.php">About</a>
				</div>
			</span>
		</li>
		

	<?php
	if(!isset($_SESSION['FirstName']))
	{
		//echo'<li><a href="StudentLogin.php">Student Login</a></li>';
		//echo'<li><a href="EducatorLogin.php">Educator Login</a></li>';
		echo'<li><a href="Login.php">Login</a></li>';
		echo'<li><a href="Signup.php">Signup</a></li>';
	}

	if(isset($_SESSION['StudentID']))
	{
		echo'<li><a href="myClass.php">My Class</a></li>';
		echo'<li><a href="myAssignments.php">My Assignments</a></li>';
		echo'<li><a href="myQuizes.php">My Quiz</a></li>';
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

	if(isset($_SESSION['FirstName']))
	{
echo nl2br("<li>
	<span id=\"accordion\">" .
		'<div id="accordionTest" class="accordion-link" data-toggle="collapse" data-target="#collapseTest" aria-expanded="true" aria-controls="collapseOne">
					In Progress Features
		</div>' .
		'<div id="collapseTest" class="collapse" aria-labelledby="accordionTest" data-parent="#accordion">' .
			'<a href="testUpload.php">File Upload</a>' .
		'</div>' .
	'</span>' .
'</li>');
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