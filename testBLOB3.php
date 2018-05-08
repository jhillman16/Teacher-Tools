<?php $title = "File Upload"; include 'header.php';?>
<?php
include("ConnectDatabase.php");
//Open a new connection to the MySQL server


$myQ = "select * from File;";
$result = mysql_query($myQ)or die ("no blobs found");
$row = mysql_fetch_array($result);
$content = $row['img_blob'];
$id = $row["img_id"]."<br/>";
$name = $row["img_name"]."<br/>";
echo $id; 
echo $name;
header('Content-type: image/jpg'); 	
echo $content."<br/>";


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