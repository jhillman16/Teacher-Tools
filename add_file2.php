<?php
include("ConnectDatabase.php");

if(is_uploaded_file($_FILES['uploaded_file']['tmp_name'])) {

	echo '<p>IN if(is_uploaded_file)</p>';

	// Make sure the file was sent without errors
	if($_FILES['uploaded_file']['error'] == 0) {

		echo '<p>IN if($_FILES[\'uploaded_file\'][\'error\'] == 0)</p>';

		// @@@@@@@@@@@@@@
		// Path is wrong. You have to specify the path of the folder on the web server
		// Typically, it'd be something akin to "var/www/Blean_Photos/images"
		// Also make sure the folder exists and that you have write permissions for it
		$target_path = "app/Files/";

		$target_path = $target_path . basename($_FILES['uploaded_file']['name']);

		echo dirname(__FILE__) . "\n";
		echo "<p>\$target_path = $target_path</p>";

		echo "<pre>".print_r($_FILES,true)."</pre>";

		//if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_path)) {

			//echo '<p>IN if(move_uploaded_file($_FILES[\'uploaded_file\'][\'tmp_name\'], $target_path))</p>';

			// @@@@@@@@@@@@@
			// To keep things simple, we'll keep your DB structure the same except for 1 thing:
			// add a field of type 'varchar' with 100 or so characters, in your 'images' table.
			// Name it something like "image_path".
			// I copied over your "old" code but note that I got rid of "data" (which was your image)
			// and added $image_path variable instead

			// Gather all required data
			$name = mysqli_real_escape_string($_FILES['uploaded_file']['name']);
			$mime = mysqli_real_escape_string($_FILES['uploaded_file']['type']);
			$size = intval($_FILES['uploaded_file']['size']);
			$image_path = mysqli_real_escape_string($target_path);

			echo "<p>After creating variables.</p>";

			$query = "INSERT INTO `Files` (`name`, `mime`, `size`, `data`, `created`)
			VALUES ('{$name}', '{$mime}', {$size}, '', NOW())";
			$result = mysqli_query($query);

		echo "<pre>".print_r($_FILES,true)."</pre>";
		//}
	}
	else {
		echo "<p>Error! Couldn't uploaded file.</p>";
	}
}
?>