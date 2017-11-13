<?php

session_start();

include("ConnectDatabase.php"); //Goes through steps of connecting to database

// Escape user inputs for security
$UserName	= mysqli_real_escape_string($link, $_REQUEST['AdminUsername']);
$Password	= mysqli_real_escape_string($link, $_REQUEST['StudentPassword']);

// attempt get student info
$query = "SELECT FirstName, LastName, StudentID FROM StudentsUser WHERE '$UserName'= UserName and '$Password'= Password";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$_SESSION['StudentID'] = $row['StudentID'];
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
		header('Location: StuCreate.html');
	}
}
else
{
	echo "ERROR: Incorrect username/password" . mysqli_error($link);
	mysqli_close($link); // close connection
	header('Location: StudentLogin.htm');
}

?>