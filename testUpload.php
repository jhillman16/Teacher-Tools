<html>
<head><title> Form Uploading </title></head>
<body>

<?php

if(ini_get('file_uploads') == 1)
{
  echo 'HTTP Upload Enabled<br />';
}
else
{
  echo 'HTTP Upload Disabled<br />';
}
echo 'post_max_size = ' . ini_get('post_max_size') . "\n";

?>

<h3>File upload</h3>
<p>Select a File </p>
	<form action="testUpload-script.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file" id="file" size="500" />
		<input type="submit" name="submit" value="Upload File" />
	</form>

</body>
</html>