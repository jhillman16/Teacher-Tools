<?php $title = "File Upload"; include 'header.php';?>
<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server


$sql = "SELECT * FROM Files WHERE Mime = $type";
$sth = $link->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';


	/*
	//$name= mysqli_real_escape_string($link, $_GET['Name']);
	$mysql_run=mysqli_query($link, "SELECT HEX(Name) FROM Files");
	
	while ($row=mysqli_fetch_assoc($mysql_run)) {
		
		//header("Content-type: image/jpeg");
		$name=$row['Name'];
		//$type=$row['type'];
		//$size=$row['size'];
		//header("Content-length: $size");
		//header("Content-type: $type");
		//header("Content-Disposition: attachment; filename=$name");
		
		//echo $image=$row['image'];
		
		echo "<img src='Files/".$row['Data']."' />";
		
	}
	
	*/
	
?>
<?php include 'footer.php';?>