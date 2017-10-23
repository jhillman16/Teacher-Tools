<?php
$link = mysqli_connect("localhost", "mmilton1", "mmilton1", "mmilton1DB");
 
// Check connection
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// Escape user inputs for security
$UserName	= mysqli_real_escape_string($link, $_REQUEST['AdminUsername']);
$Password	= mysqli_real_escape_string($link, $_REQUEST['EducatorPassword']);

//echo "$UserName";
//echo "$Password";

{
// attempt get teacher info

	$query = "SELECT FirstName,LastName FROM TeacherUser WHERE '$UserName'= UserName and '$Password'= Password";
}


$result = mysqli_query($link, $query);

if(mysqli_num_rows($result)>0){
    echo "Login successful.";
    header('Location: Creat.html');
} else{
    echo "ERROR: Incorrect username/password" . mysqli_error($link);
}
 


// close connection
mysqli_close($link);

?>