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
  
}
else
{
  echo 'HTTP Upload Disabled<br />';
}


?>


<main>



<section>
<header>
	<h1>Home Page</h1>
	
</header>

	
	 <body>
<h3>File upload </h3>
Select a File <BR />
<Form action ="upload.php" method = "post" enctype="multipart/form-data">
<input type="file" name ="file" size = "500" >
<input type ="submit" value = "Upload File">


</form>
<body>

  



</main>

</body>
</html>
<?php include 'footer.php';?>
