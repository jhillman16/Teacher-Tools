<?php $title = "File Upload"; include 'header.php';?>

<h2>File upload</h2>

<p style="font-family:courier;">Select File</p>

<form action="testBLOB2.php" method="POST"  enctype="multipart/form-data">
	<div>
	<label><span>File:</span>
	<input type="file" id="id" name="file" />
	</label>
	</div>

	<div>
	<input type="submit" value="Submit" name="submit" />
	</div>
</form>

<h3>VIEW YOUR FILES</h3>
<p><a href="testBLOB3.php">Click here</a></p>

<h5>Upload links</h5>
<p><a href="UploadFiles2.php">Click here</a></p>

<?php include 'footer.php';?>