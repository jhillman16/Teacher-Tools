<?php $title = "File Upload"; include 'header.php';?>


<?php
include("ConnectDatabase.php");


@$name = $_POST['email'];
//@$link = $_POST['email'];




	
			// Insert into the table "table" for column "image" with our binary string of data ("content")
			mysqli_query($link,"INSERT INTO Link (Name, Date) Values('$name',Now())") or 
			die("Couldn't execute query in your database!".mysqli_error($link));
			
			echo 'Link was inserted into the database!';
			//echo '<a href="upload.php">view</a>';
		
	
	





?>
<br>
<br>




 <a href="UploadFiles2.php">Return to "Upload Page"</a>

<?php include 'footer.php';?>