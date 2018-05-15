<?php $title = "Link Upload"; include 'header.php';?>

<h2>Upload Link</h2>
<p style="font-family:courier;">Name your link and enter address</p>

<form action="upload2.php" method="post">
	<div>
	<label><span>Name:</span>
	<input type="text" id="username" name="username" />
	</label>
	</div>

	<div>
	<label><span>Link:</span>
	<input type="text" id="link" name="email" />
	</label>
	</div>

	<div>
    <input type="submit" name="submit" value="Submit me!" />
	</div>
</form>

<h3>VIEW YOUR LINKS:</h3>
<p><a href="upload.php">Click here</a></p>

<h3>Upload Files</h3>
<p><a href="UploadFiles3.php">Click here</a></p>

<?php include 'footer.php';?>