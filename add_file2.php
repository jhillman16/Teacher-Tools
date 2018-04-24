<?php
include("ConnectDatabase.php");

if(is_uploaded_file($_FILES['uploaded_file']['tmp_name'])) {
	// Make sure the file was sent without errors
	if($_FILES['uploaded_file']['error'] == 0) {
		// @@@@@@@@@@@@@@
		// Path is wrong. You have to specify the path of the folder on the web server
		// Typically, it'd be something akin to "var/www/Blean_Photos/images"
		// Also make sure the folder exists and that you have write permissions for it
		$target_path = "Files/";

		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			// @@@@@@@@@@@@@@
			// this echo is not really necessary
			echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
			" has been uploaded";

			// @@@@@@@@@@@@@
			// To keep things simple, we'll keep your DB structure the same except for 1 thing:
			// add a field of type 'varchar' with 100 or so characters, in your 'images' table.
			// Name it something like "image_path".
			// I copied over your "old" code but note that I got rid of "data" (which was your image)
			// and added $image_path variable instead

			// Gather all required data
			$name = mysql_real_escape_string($_FILES['uploaded_file']['name']);
			$mime = mysql_real_escape_string($_FILES['uploaded_file']['type']);
			$size = intval($_FILES['uploaded_file']['size']);
			$image_path = mysql_real_escape_string($target_path);

			// @@@@@@
			// Note changes to your query as well
			// Make sure you added the "image_path" field to the "images" table!!
			$query = "INSERT INTO `Files` (`name`, `mime`, `size`, `data`, `created`)
			VALUES ('{$name}', '{$mime}', {$size}, '', NOW())";
			$result = mysql_query($query);	 
		}

		else {
			echo 'Error! A file was not sent!';
		}
	}
}
?>