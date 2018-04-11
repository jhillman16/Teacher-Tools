<?php $title = "upload pg 1"; include 'header.php';?>




<?php
if(isset($_SESSION['StudentID']) || (isset($_SESSION['TeacherID'])))
{
echo "<form enctype=\"multipart/form-data\" action=\"testUpload-script.php\" method=\"POST\">";
echo "Send this file: <input id=\"userfile\" type=\"file\" name=\"fileupload\" />";
echo "<input type=\"submit\" value=\"Send File\" />";
echo "</form>";
}
else
{
echo "<p>You need JavaScript.</p>.";
}
?>

<script>
if(!isset($_SESSION['StudentID']) && (!isset($_SESSION['TeacherID'])))
	window.location = 'Login.php';
</script>



<?php include 'footer.php';?>