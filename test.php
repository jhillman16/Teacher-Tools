<?php

session_start();
include("ConnectDatabase.php"); //Goes through steps of connecting to database


// attempt get teacher info
$query = "INSERT INTO Test(Message) VALUES('What a day')";

$result = mysqli_query($link, $query); 

$sql = "SELECT Message FROM Test";
$result2 = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Message"];

// close connection
mysqli_close($link);


?>