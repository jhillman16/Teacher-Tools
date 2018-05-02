<?php

session_start();

include("ConnectDatabase.php"); //Goes through steps of connecting to database

// Escape user inputs for security
$UserName	= mysqli_real_escape_string($link, $_REQUEST['Username']);
$Password	= mysqli_real_escape_string($link, $_REQUEST['Password']);

// attempt get teacher info
$query = "SELECT FirstName, LastName, TeacherID FROM TeacherUser WHERE ('$UserName'= UserName OR '$UserName' = Email) AND '$Password'= Password";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$_SESSION['TeacherID'] = $row['TeacherID'];
	$_SESSION['FirstName'] = $row['FirstName'];
	$_SESSION['LastName'] = $row['LastName'];

	mysqli_close($link); // close connection
	if(isset($_SESSION['URL']))
	{
		header('Location:' . $_SESSION['URL']);
	}
	else
	{
		echo "<script>clearLogin();</script>";
		header('Location: EducatorHome.php');
	}
}
else
{
	// attempt get student info
	$query = "SELECT FirstName, LastName, StudentID FROM StudentsUser WHERE ('$UserName'= UserName OR '$UserName' = Email) AND '$Password'= Password";
	$result = mysqli_query($link, $query);

	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$_SESSION['StudentID'] = $row['StudentID'];
		$_SESSION['FirstName'] = $row['FirstName'];
		$_SESSION['LastName'] = $row['LastName'];

		mysqli_close($link); // close connection
		if(isset($_SESSION['URL']))
		{
			header('Location:' . $_SESSION['URL']);
		}
		else
		{
			echo "<script>clearLogin();</script>";
			header('Location: StudentHome.php');
		}
	}
	else //Could not login as a student or teacher
	{
		$_SESSION['error'] = "Incorrect username or password!";
		echo "ERROR: Incorrect username/password" . mysqli_error($link);
		mysqli_close($link); // close connection
		header('Location: Login.php');
	}
}

?>