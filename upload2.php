<?php $title = "File Upload"; include 'header.php';?>


<a href="<?=$linkName?>" target="_blank">Link 1</a>
<br>

<?php
include("ConnectDatabase.php");

echo $_POST['username'];
echo "\n";
echo $linkName;

@$name = $_FILES['email']['name'];



	
			// Insert into the table "table" for column "image" with our binary string of data ("content")
			mysqli_query($link,"INSERT INTO Files ( Name, Mime, Size, Data, Created) Values('$name','', '','',Now())") or 
			die("Couldn't execute query in your database!".mysqli_error($link));
			
			echo 'Data-File was inserted into the database!|';
			//echo '<a href="upload.php">view</a>';
		
	
	





?>
<br>
<br>




 <a href="UploadFiles2.php">Return to "Upload Page"</a>

<?php include 'footer.php';?>