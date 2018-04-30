<?php $title = "File Upload"; include 'header.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Tools!!</title>
    <link rel="stylesheet" type="text/css" href="normalize.css" />
    
	<meta charset="utf-8" />
</head>
<body>



<main>



<section>
<header>
	<h1>Home Page</h1>
	
</header>

	
	 <body>
<h3>File upload </h3>
<p style="font-family:courier;">Select File</p>
<form action = "testBLOB2.php" method= "POST"  enctype = "multipart/form-data">
      <input type = "file" name = "file"><br><br>
      <input type = "submit" value = "Submit">
</form>



<form>
<br><br>

<h3>VIEW YOUR FILES</h3>
<a href="list.php">Click here</a>
</form>

<br>
<br>
<h5>Upload links</h5>
<a href="UploadFiles2.php">Click here</a>

<body>


</main>

</body>
</html>
<?php include 'footer.php';?>