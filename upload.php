
<?php $title = "File Upload"; include 'header.php';?>
<?php


include("ConnectDatabase.php");
//Open a new connection to the MySQL server


	
	//$id= mysqli_real_escape_string($link, $_GET['file']);
	$mysql_run=mysqli_query($link, "SELECT Name FROM Link;");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		//header("Content-type: image/jpeg");
		$name=$row['name'];
		//echo "\r\n";
		echo $image=$row['Name']."\n";
		
	}
	
	
	






?>
<br>
<br>
<a href="UploadFiles.php">Return to "Upload Pade"</a>


<?php include 'footer.php';?>