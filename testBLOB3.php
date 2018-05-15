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
	
	
 


	


	
?>

<?php
    require_once "db.php";
    $sql = "SELECT ID FROM Files ORDER BY ID DESC"; 
    $result = mysqli_query($link, $sql);
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>

</HEAD>
<BODY>
<?php
echo 'hello';
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["ID"]; ?>" /><br/>
	
<?php		
	}
    mysqli_close($link);
?>
</BODY>
</HTML>
<?php include 'footer.php';?>