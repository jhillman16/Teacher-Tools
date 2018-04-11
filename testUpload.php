<?php $title = "upload pg 1"; include 'header.php';?>




<?php
if(isset($_SESSION['StudentID']) || (isset($_SESSION['TeacherID'])))
{
echo "<form enctype=\"multipart/form-data\" action=\"testUpload-script.php\" method=\"POST\">";
echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"20000\" />"; // 20MB
echo "Send this file: <input id=\"userfile\" type=\"file\" name=\"fileupload\" />";
echo "<input type=\"submit\" value=\"Send File\" />";
echo "</form>";
}
else
{
echo "<p>You need JavaScript.</p>";
$php_redir = true;
}
?>

<script>
	var redir = <?php echo json_encode($php_redir); ?>;
	if(redir)
		window.location = 'Login.php';
</script>



<?php include 'footer.php';?>