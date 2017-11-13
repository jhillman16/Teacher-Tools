<!DOCTYPE html>

<?php
session_start();

if(!isset($_SESSION['FirstName']))
{
    $_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
    header('Location: StudentLogin.htm');
}
?>

<html>

<head> 
<title> Register For a Course</title>
<link rel="stylesheet" type="text/css" href="styleTEST1.css" />
<meta charset = "UTF-8">
</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Search For a Course </h1>
<body>

<form action="Register_For_Class2.php" method="post">
    
    Search by Professor First Name, Last Name, or Class Name:<br>
    <input type="text" placeholder="Search" name="SearchText" required><br><br>
    
    <input type = "submit" value = "Submit">

</form>

</body>

</html>