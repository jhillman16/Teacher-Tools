<!DOCTYPE html>

<?php
include 'header.php';

session_start();

if(!isset($_SESSION['FirstName']))
{
    $_SESSION['URL'] = basename($_SERVER['PHP_SELF']);
    header('Location: StudentLogin.htm');
}
?>

<html>

<section>
<header> 
    <h1> Search For a Course</h1>
</header>

<div id="content">

<body>

<form action="Register_For_Class2.php" method="post">
    
    Search by Professor First Name, Last Name, or Class Name:<br>
    <input type="text" placeholder="Search" name="SearchText" required><br><br>
    
    <input type = "submit" value = "Submit">

</form>

</div>

</section>

</body>

</html>

<?php include 'footer.php';?>