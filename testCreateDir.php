<?php $title = "TESTING CREATING FOLDER - variable passed"; include 'header.php';

// SU server permissions too funky for this to work properly
//  must set containing folder permissions to 0777 to use mkdir
//  but that sets owner to "www-data", not mmilton1

error_reporting(E_ALL);
ini_set('display_errors', '1');

$CourseName = $_POST['courseName'];
//$CourseName = mysqli_real_escape_string($link, $_REQUEST['courseName']);

//echo $CourseName;

$path = "./$CourseName"; // the period indicates current directory, single quotes don't work (remember shell)
if (!is_dir($path)) 
{
	if(!mkdir($path, 0775, true))
		echo "<p>Folder not created.</p>";
}

echo '<p>' . $CourseName . '</p>';

include 'footer.php';?>