<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server


//$cxn = mysqli_connect($host,$user,$password,$database);
// Check connection


mysqli_query($link,"SELECT * FROM Files WHERE Name='peonies2.jpg'");



	
	$name= mysqli_real_escape_string($link, $_GET['Name']);
	$mysql_run=mysqli_query($link, "SELECT * FROM Files WHERE Name =$name");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		header("Content-type: image/jpeg");
		$name=$row['name'];
		$type=$row['type'];
		$size=$row['size'];
		//header("Content-length: $size");
		//header("Content-type: $type");
		//header("Content-Disposition: attachment; filename=$name");
		
		//echo $image=$row['image'];
		echo "<img src='Image/".$row['Data']."' />";
		
	}
	
	
	

