<?php

session_start();

include("ConnectDatabase.php"); //Goes through steps of connecting to database

// Escape user inputs for security
$UserName	= mysqli_real_escape_string($link, $_REQUEST['AdminUsername']);
$Password	= mysqli_real_escape_string($link, $_REQUEST['EducatorPassword']);

// attempt get teacher info
$query = "SELECT FirstName, LastName, TeacherID FROM TeacherUser WHERE '$UserName'= UserName and '$Password'= Password";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$_SESSION['TeacherID'] = $row['TeacherID'];
	$_SESSION['FirstName'] = $row['FirstName'];
	$_SESSION['LastName'] = $row['LastName'];
	echo "Login successful.";
	mysqli_close($link); // close connection
	if(isset($_SESSION['URL']))
	{
		header('Location:' . $_SESSION['URL']);
	}
	else
	{
		header('Location: Creat.html');
	}
}
else
{
	echo "ERROR: Incorrect username/password" . mysqli_error($link);
	mysqli_close($link); // close connection
	header('Location: EducatorLogin.htm');
}

?>