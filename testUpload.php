<?php $title = "upload pg 1"; include 'header.php';?>




<?php
if(!isset($_SESSION['StudentID']) && (!isset($_SESSION['TeacherID'])))
{
echo "" .
"<form enctype=\"multipart/form-data\" action=\"testUpload-script.php\" method=\"POST\">" .
"Send this file: <input id=\"userfile\" type=\"file\" name=\"fileupload\" />" .
"<input type=\"submit\" value=\"Send File\" />" .
"</form>";
}
else
{
	<script>
    window.location = 'http://www.example.com/newlocation';
	</script>
	echo "<p>You need JavaScript.</p>."
}
?>




<?php include 'footer.php';?>