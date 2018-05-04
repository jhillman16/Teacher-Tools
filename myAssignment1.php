<?php $title = "My Assignments"; include 'header.php'; include 'checkSession.php';

// WHAT IS SUPPOSED TO BE ON THIS PAGE
if(!isset($_COOKIE['CourseID']))
{
	echo '<script>';
	echo 'window.location.replace("myAssignments.php");';
	echo '</script>';
}
?>

<p><a href="myAssignments.php" class="button" onclick="deleteCookie(AssignmentID)">Select a different course</a></p>

<!-- <p><a href="#">SEE OTHER ASSIGMENTS</a></p>
<h2>File upload</h2>
<p>Select File</p>
<form action ="#" method = "post" enctype="multipart/form-data">
<input type="file" name ="file" size = "500" >
<input type ="submit" name="T1" value = "Upload File"> -->


<?php include 'footer.php';?>