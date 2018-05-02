<?php $title = "My Assignments"; include 'header.php';

if (!isset($_SESSION['StudentID']) && !isset($_SESSION['TeacherID']))
{
	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}

// WHAT IS SUPPOSED TO BE ON THIS PAGE
if(!isset($_COOKIE['AssignmentID']))
{
	echo '<script>';
	echo 'window.location.replace("myAssignments.php");';
	echo '</script>';
}
print_r($_COOKIE);
?>

<p><a href="myAssignments.php" class="button" onclick="deleteCookie(AssignmentID)">Select a different course</a></p>

<!-- <p><a href="#">SEE OTHER ASSIGMENTS</a></p>
<h2>File upload</h2>
<p>Select File</p>
<form action ="#" method = "post" enctype="multipart/form-data">
<input type="file" name ="file" size = "500" >
<input type ="submit" name="T1" value = "Upload File"> -->


<?php include 'footer.php';?>