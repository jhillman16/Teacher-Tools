<?php $title = "File Upload"; include 'header.php';?>
<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server

	
	//$id= mysqli_real_escape_string($link, $_GET['file']);
	$mysql_run=mysqli_query($link, "SELECT Name FROM Files;");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		//header("Content-type: image/jpeg");
		$name=$row['name'];
		echo nl2br("\n");
		echo $image=$row['Name'];
		
	}
	
	
 

//include("inc/library.php");



$sql = "SELECT * FROM Files WHERE ID = 21;";

$result = mysql_query($sql) or die(mysql_error());  
$row = mysql_fetch_array($result);

header("Content-type: image/jpeg");
echo $row['imageContent'];
$link->close();

	
	


	
?>
<?php include 'footer.php';?>