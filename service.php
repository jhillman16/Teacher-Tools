<?php
 
$hostname = "builder-application:us-east1:builder-app-test=tcp:3306";
$username = "Jack";
$password = "Golden#1";
$database = "Builder_Test";
    $link = mysqli_connect($hostname, $username, $password, $database);
 
// Check connection
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM Test";
 
// Check if there are results
if ($result = mysqli_query($link, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
 
?>