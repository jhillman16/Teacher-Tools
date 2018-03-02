<?php $title = "Teacher Tools"; include 'header.php';?>

<p style="text-align: center;"><img alt="logo" src="images/logo.png" /></p>

<?php // no need for register button if account is logged in
if(!isset($_SESSION['StudentID']) && (!isset($_SESSION['TeacherID'])))
echo '<p style="text-align: center;"><a href="Signup.php" class="button">Register for your account</a></p>';
?>

<?php include 'footer.php';?>