<?php

// Escape user inputs for security
$FirstName		= $_POST['firstname'];
$LastName		= $_POST['lastname'];
$UserName		= $_POST['username'];
$Password		= $_POST['password'];
$ConfirmPassword	= $_POST['confirm_password'];
$Email			= $_POST['email'];
$ConfirmEmail		= $_POST['confirm_email'];
$TeacherStudent 	= $_POST['ans'];

session_start();

if($Password != $ConfirmPassword)
{
	$_SESSION['errorPassword'] = 'Passwords do not match!';
	header('Location: Signup.php');
        exit();
}
if(strlen($Password) < 8)
{
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, and 1 lowercase letter.';
	header('Location: Signup.php');
        exit();
}
if(strcspn($Password, '0123456789') == strlen($Password))
{
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, and 1 lowercase letter.';
	header('Location: Signup.php');
        exit();
}
if($Password == strtoupper($Password) || $Password == strtolower($Password))
{
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, and 1 lowercase letter.';
	header('Location: Signup.php');
        exit();
}
if($Email != $ConfirmEmail)
{
	$_SESSION['errorEmail'] = 'Email Addresses do not match!';
	header('Location: Signup.php');
        exit();
}
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['errorEmail'] = 'Invalid email format!';
	header('Location: Signup.php');
        exit();
}

//Connect to database
$link = mysqli_connect("localhost", "mmilton1", "mmilton1", "mmilton1DB");
 
// Check connection
if (!$link) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}

$query = "SELECT UserName FROM StudentsUser WHERE '$UserName'= UserName";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorUser'] = 'User name already exists!';
	header('Location: Signup.php');
        exit();
}
$query = "SELECT UserName FROM TeacherUser WHERE '$UserName'= UserName";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorUser'] = 'User name already exists!';
	header('Location: Signup.php');
        exit();
}

$email = $_POST['email'];
$query = "SELECT Email FROM StudentsUser WHERE '$email'= Email";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorEmail'] = 'Email already exists!';
	header('Location: Signup.php');
        exit();
}
$query = "SELECT UserName FROM TeacherUser WHERE '$email'= Email";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorEmail'] = 'Email already exists!';
	header('Location: Signup.php');
        exit();
}

// attempt insert query execution
if($TeacherStudent == "student")
{
	$query = "INSERT INTO StudentsUser (Username, Password, FirstName, LastName, Email, JoinedDate) 
            VALUES ('$UserName', '$Password', '$FirstName', '$LastName', '$Email', now())";
	if(mysqli_query($link, $query))
	{
		$_SESSION['StudentID'] = mysqli_insert_id($link);
		echo "Records added successfully " . $_SESSION['StudentID'] . ".";
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}
}
elseif ($TeacherStudent == "teacher")
{
	$query = "INSERT INTO TeacherUser (Username, Password, FirstName, LastName, Email, JoinedDate) 
            VALUES ('$UserName', '$Password', '$FirstName', '$LastName', '$Email', now())";
	if(mysqli_query($link, $query))
	{
		$_SESSION['TeacherID'] = mysqli_insert_id($link);
		echo "Records added successfully " . $_SESSION['TeacherID'] . ".";
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}
}

// close connection
mysqli_close($link);

//Selects which welcome page to redirect to
if($TeacherStudent == "student")
{
	header('Location: StuCreate.html');
}
else
{
	header('Location: Creat.html');
}

?>