<?php
	session_start();
    if(!isset($_SESSION['QuizID']))
    {
        header('Location: myAssignments.php');
    }

	include("ConnectDatabase.php"); //Goes through steps of connecting to database

	$questionNum = 0;
	$correctNum = 1;

	$query = "SELECT Response FROM Response WHERE QuizID = $QuizID AND IsCorrect = '1'";
	$r = mysqli_query($link, $query);

	while($row=mysqli_fetch_array($r))
	{
			$questionID = 'q' . $questionNum;
			echo $questionID;

			$questionNum++;
	}
echo mysqli_error($link);
	echo 'hey';

?>


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

echo $_POST['q0'];
echo 'hello';

/*
if($Password != $ConfirmPassword) //If the passwords do not match
{
	$_SESSION['errorPassword'] = 'Passwords do not match!'; //Error message to display
	header('Location: Signup.php');
        exit();
}
if(strlen($Password) < 8) //If the password is less than 8 characters
{
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, 1 number, and 1 lowercase letter.'; //Error message to display
	header('Location: Signup.php');
        exit();
}
if(strcspn($Password, '0123456789') == strlen($Password)) //If the length of the password is the same after taking out numbers
{
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, 1 number, and 1 lowercase letter.'; //Error message to display
	header('Location: Signup.php');
        exit();
}
if($Password == strtoupper($Password) || $Password == strtolower($Password)) //If the password is all uppercase or all lowercase
{
	$_SESSION['errorPassword'] = 'Passwords needs atleast: 8 characters, 1 uppercase letter, 1 number, and 1 lowercase letter.'; //Error message to display
	header('Location: Signup.php');
        exit();
}
if($Email != $ConfirmEmail) //If the emails do not match
{
	$_SESSION['errorEmail'] = 'Email Addresses do not match!'; //Error message to display
	header('Location: Signup.php');
        exit();
}
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) //If it is not in correct email format
{
	$_SESSION['errorEmail'] = 'Invalid email format!'; //Error message to display
	header('Location: Signup.php');
        exit();
}

include("ConnectDatabase.php"); //Goes through steps of connecting to database

$query = "SELECT UserName FROM StudentsUser WHERE '$UserName'= UserName";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorUser'] = 'User name already exists!'; //Error message to display
	header('Location: Signup.php');
        exit();
}
$query = "SELECT UserName FROM TeacherUser WHERE '$UserName'= UserName";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorUser'] = 'User name already exists!'; //Error message to display
	header('Location: Signup.php');
        exit();
}

$query = "SELECT Email FROM StudentsUser WHERE '$Email'= Email";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorEmail'] = 'Email already exists!'; //Error message to display
	header('Location: Signup.php');
        exit();
}
$query = "SELECT UserName FROM TeacherUser WHERE '$email'= Email";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)>0)
{
	$_SESSION['errorEmail'] = 'Email already exists!'; //Error message to display
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
		$_SESSION['FirstName'] = $FirstName;
		$_SESSION['LastName'] = $LastName;
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
		$_SESSION['FirstName'] = $FirstName;
		$_SESSION['LastName'] = $LastName;
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
	header('Location: StudentHome.php');
}
else
{
	header('Location: EducatorHome.php');
}

*/
?>