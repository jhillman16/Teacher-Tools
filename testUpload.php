<?php $title = "upload pg 1"; include 'header.php';?>




<?php
if(!isset($_SESSION['StudentID']) && (!isset($_SESSION['TeacherID'])))
{
?>


<form enctype="multipart/form-data" action="testUpload-script.php" method="POST">

    Send this file: <input id="userfile" type="file" name="fileupload" />

    <input type="submit" value="Send File" />

</form>

<?php
}
else
{
	echo "<p>Not logged in</p>."
}
?>




<?php include 'footer.php';?>