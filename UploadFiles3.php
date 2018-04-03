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
<form action ="upload.php" method = "post" enctype="multipart/form-data">
<input type="file" name ="file" size = "500" >
<input type ="submit" name="T1" value = "Upload File">



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