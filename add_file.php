 <?php
 include("ConnectDatabase.php");
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
	echo 'Error';
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
		 
        // Connect to the database
        //$dbLink = new mysqli('127.0.0.1', 'user', 'pwd', 'myTable');
        //if(mysqli_connect_errno()) {
            //die("MySQL connection failed: ". mysqli_connect_error());
        //}
 
        // Gather all required data
        $name = mysql_real_escape_string($_FILES['uploaded_file']['name']);
		 echo 'Hello';
        $mime = mysql_real_escape_string($_FILES['uploaded_file']['type']);
		 echo 'Hello 2';
        $data = mysql_real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
		 echo 'Hello 3';
        $size = intval($_FILES['uploaded_file']['size']);
		 echo 'Hello 4';
		

        // Create the SQL query
        $query = "
            INSERT INTO `Files` (
                `Name`, `Mime`, `Size`, `Data`, `Created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = mysql_query($query);

        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file';
               
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="index.html">here</a> to go back</p>';
?>