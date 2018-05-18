
<?php $title = "Link Upload"; include 'header.php';?>
<?php


include("ConnectDatabase.php");
//Open a new connection to the MySQL server


	
	//$id= mysqli_real_escape_string($link, $_GET['file']);
	$mysql_run=mysqli_query($link, "SELECT Name FROM Link;");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		//header("Content-type: image/jpeg");
		$name=$row['name'];
		echo nl2br ("\r\n");
		$image=$row['Name']."\n";
		echo "<a href='$image'>$image</a>";
	}
	
	
	






?>
<br>
<br>
<a class="button" href="UploadFiles.php">Return to "Upload Pade"</a>


<?php include 'footer.php';?>