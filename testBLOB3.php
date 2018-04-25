<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server


//$cxn = mysqli_connect($host,$user,$password,$database);
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['id'])) {
	$id= mysqli_real_escape_string($link, $_GET['id']);
	$mysql_run=mysqli_query($link, "SELECT * FROM uploaded WHERE file_id ='$id';");
	
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