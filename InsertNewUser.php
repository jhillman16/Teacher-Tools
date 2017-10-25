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

if($_POST['password'] != $_POST['confirm_password'])
{
	$_SESSION['errorPassword'] = 'Passwords do not match!';
	header('Location: Signup.php');
        exit();
}
if( strlen($_POST['password']) < 8 ) {
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, and 1 lowercase letter.';
	header('Location: Signup.php');
        exit();
}
if(strcspn($_POST['password'], '0123456789') == strlen($_POST['password'])) {
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, and 1 lowercase letter.';
	header('Location: Signup.php');
        exit();
}
if($_POST['password'] == strtoupper($_POST['password']) || $_POST['password'] == strtolower($_POST['password'])){
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, and 1 lowercase letter.';
	header('Location: Signup.php');
        exit();
}
if($_POST['email'] != $_POST['confirm_email'])
{
	$_SESSION['errorEmail'] = 'Email Addresses do not match!';
	header('Location: Signup.php');
        exit();
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
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

$username = $_POST['username'];
$query = "SELECT UserName FROM StudentsUser WHERE '$username'= UserName";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorUser'] = 'User name already exists!';
	header('Location: Signup.php');
        exit();
}
$query = "SELECT UserName FROM TeacherUser WHERE '$username'= UserName";
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
}
elseif ($TeacherStudent == "teacher") {
	$query = "INSERT INTO TeacherUser (Username, Password, FirstName, LastName, Email, JoinedDate) 
            VALUES ('$UserName', '$Password', '$FirstName', '$LastName', '$Email', now())";
}

if(mysqli_query($link, $query)){
	echo "Records added successfully.";
} else{
	echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

if($TeacherStudent == "student")
{
	header('Location: StuCreate.html');
}else{
	header('Location: Creat.html');
}

// close connection
mysqli_close($link);

?>