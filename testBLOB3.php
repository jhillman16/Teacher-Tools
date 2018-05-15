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
	
	
   //require_once "db.php";
    if(isset($_GET['ID'])) {
        $sql = "SELECT Mime,Data FROM Files WHERE ID=" . $_GET['ID'];
		$result = mysqli_query($link, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($link));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["Mime"]);
        echo $row["Data"];
	}
	mysqli_close($link);
	
	
	


	
?>
<?php include 'footer.php';?>