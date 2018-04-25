<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server


//$cxn = mysqli_connect($host,$user,$password,$database);
// Check connection


if (isset($_GET['name'])) {
	$id= mysqli_real_escape_string($link, $_GET['name']);
	$mysql_run=mysqli_query($link, "SELECT * FROM Files WHERE Name ='$name';");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		header("Content-type: image/jpeg");
		$name=$row['name'];
		$type=$row['type'];
		$size=$row['size'];
		//header("Content-length: $size");
		//header("Content-type: $type");
		//header("Content-Disposition: attachment; filename=$name");
		echo $image=$row['image'];
		
	}
	
	
	

}

else {
	echo 'Error!';
}