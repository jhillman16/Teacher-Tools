<?php
	session_start();

	if(isset($_POST) & !empty($_POST))
	{
		$username = $_POST['username'];
		$teacherStudent = $_POST['ans'];
		$query;

		if($teacherStudent == "student")
		{
			$query = "SELECT * FROM StudentsUser WHERE UserName = '$username' OR Email = '$username'";
		}
		elseif($teacherStudent == "teacher")
		{
			$query = "SELECT * FROM TeacherUser WHERE UserName = '$username' OR Email = '$username'";
		}

		$result = mysqli_query($link, $query);

		if(mysqli_num_rows($result) == 0)
		{
			echo $query;
			$_SESSION['error'] = 'Username/email does not exist!'; //Error message to display
			//header('Location: Forgot.php');
			//exit();
		}
		elseif(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);

			$password = $row['Password'];
			$to = $row['Email'];
			$subject = "Teacher Tools Recovered Password";
			$message = "Please use this password to login: " . $password;
			$headers = "From : donotreply@TeacherTools.com";

			if(mail($to, $subject, $message, $headers))
			{
				$_SESSION['error'] = 'Your Password has been sent to your email id';
				header('Location: Login.php');
				exit();
			}
			else
			{
				$_SESSION['error'] = 'Failed to Recover your password. Please try again';
				header('Location: Forgot.php');
				exit();
			}
		}
		else
		{
			$_SESSION['error'] = 'Something went wrong. Please try again.'; //Error message to display
			header('Location: Forgot.php');
			exit();
		}
	}
?>