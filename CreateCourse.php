<!DOCTYPE html>

<?php
session_start();

if(!isset($_SESSION['FirstName']))
{
    $_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
    header('Location: EducatorLogin.htm');
}
?>

<html>

<head> 
<title> Create A Course </title>
<link rel="stylesheet" type="text/css" href="styleTEST1.css" />
<meta charset = "UTF-8">
</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Create a Course </h1>

<body>

<form action="ClassCreate.php" method="post">
    
    Course Name:<br>
    <input type="text" placeholder="Course Name" name="courseName" required><br><br>
    
    Number of Open Seats:<br>
    <input type="text" placeholder="Number of Seats" name="numSeats" required><br><br>
    
    Description:<br>
    <textarea placeholder="Description" name="description" cols="40" rows="5" required></textarea><br><br>

    <input type = "submit" value = "Submit">

</form>

</body>

</html>