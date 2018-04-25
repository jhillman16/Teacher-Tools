<?php
include("ConnectDatabase.php");

@$name = $_FILES['file']['name'];
$extension = strtolower(substr($name, strpos($name, '.') + 1));
@$tmp_name = $_FILES['file']['tmp_name'];
@$type = $_FILES['file']['type'];
@$size = $_FILES['file']['size'];
$max_size = 74752;


/*
// example code for condensing "$extension"
$allowed =  array('gif','png' ,'jpg');
$filename = $_FILES['video_file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
    echo 'error';
}
*/


if(isset($name)){

  if(!empty($name)){
  	
    if(($extension == 'jpg' || $extension == 'jpeg' || $extension =='txt' || $extension == 'doc' || $extension == 'docx')&& $size <= $max_size){
		
	// Image submitted by form. Open it for reading (mode "r")
		$fp = fopen($_FILES['file']['tmp_name'], "r");
		
		// If successful, read from the file pointer using the size of the file (in bytes) as the length.
		if ($fp) {
			$content = fread($fp, $_FILES['file']['size']);
			fclose($fp);
		
			// Add slashes to the content so that it will escape special characters.
			// As pointed out, mysql_real_escape_string can be used here as well. Your choice.
			$content = addslashes($content);
			$content= mysqli_real_escape_string($cxn, $content);
			$name= mysqli_real_escape_string($cxn, $name);
			// Insert into the table "table" for column "image" with our binary string of data ("content")
			mysqli_query($link,"INSERT INTO Files ( Name, Mime, Size, Data, Created) Values('$name','$type', '$size','$tmp_name',Now())") or 
			die("Couldn't execute query in your database!".mysqli_error($link));
			
			echo 'Data-File was inserted into the database!|';
			echo '<a href="testBLOB3.php?id=1">view</a>';
		}
		
    else{
      echo 'There was an error!';
    }
  }
  else{
    echo 'File must be jpg/jpeg and must be 73 kilobyte or less! ';
  }
	if(!empty($name)) {

		if(($extension == 'jpg' || $extension == 'jpeg' || $extension =='txt' || $extension == 'doc' || $extension == 'docx')&& $size <= $max_size) {

			// Image submitted by form. Open it for reading (mode "r")
			$fp = fopen($_FILES['file']['tmp_name'], "r");

			// If successful, read from the file pointer using the size of the file (in bytes) as the length.
			if ($fp) {
				$content = fread($fp, $_FILES['file']['size']);
				fclose($fp);

				// Add slashes to the content so that it will escape special characters.
				// As pointed out, mysql_real_escape_string can be used here as well. Your choice.
				$content = addslashes($content);
				$content= mysqli_real_escape_string($cxn, $content);
				$name= mysqli_real_escape_string($cxn, $name);
				// Insert into the table "table" for column "image" with our binary string of data ("content")
				mysqli_query($link,"INSERT INTO Files ( Name, Mime, Size, Data, Created) Values('$name','$type', '$size','$tmp_name',Now())") or 
				die("Couldn't execute query in your database!".mysqli_error($link));

				echo 'Data-File was inserted into the database!|';
				echo '<a href="showImages.php?id=1">view</a>';
			}

			else {
				echo 'There was an error!';
			}
		}

		else {
			echo 'File must be jpg/jpeg and must be 73 kilobyte or less! ';
		}
	}

	else {
		echo 'Please select a file!';
	}
}

?>