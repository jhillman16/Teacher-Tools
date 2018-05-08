<?php $title = "File Upload"; include 'header.php';?>
<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server



	
	//$name= mysqli_real_escape_string($link, $_GET['Name']);
	$mysql_run=mysqli_query($link, "SELECT HEX(Name) FROM Files");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		//header("Content-type: image/jpg");
		//$name=$row['Name'];
		//$type=$row['Mime'];
		//$size=$row['Size'];
		//header("Content-length: $size");
		//header("Content-type: $type");
		//header("Content-Disposition: attachment; filename=$name");
		
		//echo $image=$row['image'];
		
		echo "<img src='Files/".$row['Name']."' />";
		
	}
	
	
	
?>
<?php include 'footer.php';?>