
<?php $title = "File Upload"; include 'header.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Tools!!</title>
    <link rel="stylesheet" type="text/css" href="normalize.css" />
    
	<meta charset="utf-8" />
</head>
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


<main>



<section>
<header>
	<h1>Home Page</h1>
	
</header>

	
	 <body>
	 
<h3>Choose your next step: </h3>


<li>
		
					<a href="upload.php">Upload Files</a>
					<a href="upload2.php">Upload Links</a>
				
		</li>


<form>
<br><br>
<h5>To view your files</h5>
<a href="fileUpload.php">Click here</a>
</form>

<br>
<form>
<br><br>
<h5>To view your links</h5>
<a href="upload2.php">Click here</a>
</form>

<body>

  




</main>

</body>
</html>
<?php include 'footer.php';?>