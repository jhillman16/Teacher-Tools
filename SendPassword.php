<?php
	ini_set('display_errors', 1);
	require("sendgrid-php/sendgrid-php.php");

	session_start();

	include("ConnectDatabase.php"); //Goes through steps of connecting to database

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
			$_SESSION['error'] = 'Username/email does not exist!'; //Error message to display
			//header('Location: Forgot.php');
			//exit();
		}
		elseif(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);

			$password = $row['Password'];
			$email = $row['Email'];
			$htmlContent = 'Please use this password to login: ';    


			$from = new SendGrid\Email(null, "app77188938@heroku.com");
			$subject = "Teacher Tools Recovered Password";
			$to = new SendGrid\Email(null, $email);
			$content = new SendGrid\Content("text/html", $htmlContent); //" $password"
			$mail = new SendGrid\Mail($from, $subject, $to, $content);

			$apiKey = getenv('SENDGRID_API_KEY');
			$sg = new \SendGrid($apiKey);

			$response = $sg->client->mail()->send()->post($mail);
			echo $response->statusCode();
			echo $response->headers();
			echo $response->body();

echo " " . $email . " ";
echo $password;


			/*
			

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
			*/
		}
		else
		{
			$_SESSION['error'] = 'Something went wrong. Please try again.'; //Error message to display
			//header('Location: Forgot.php');
			//exit();
		}
	}
?>