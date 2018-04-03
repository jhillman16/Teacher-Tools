<?php $title = "Link Upload"; include 'header.php';?>

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
<h3>Upload Link</h3>
<p style="font-family:courier;">Name your link and enter address</p>


<form action="upload2.php" method="post">
    Name:  <input type="text" name="username" />
    Link: <input type="text" name="email" />
    <input type="submit" name="submit" value="Submit me!" />
</form>

<br>
<form>
<br><br>
<h3>VIEW YOUR LINKS:</h3>
<a href="upload2.php">Click here</a>
</form>


<form>
<br><br>
<h5>Upload Files</h5>
<a href="UploadFiles3.php">Click here</a>
</form>



<body>



</main>

</body>
</html>
<?php include 'footer.php';?>