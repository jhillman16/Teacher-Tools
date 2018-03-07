<?php

session_start();
include("ConnectDatabase.php"); //Goes through steps of connecting to database


// attempt get teacher info
$query = "INSERT INTO Test (Message) VALUES('Hello World')";

$result = mysqli_query($link, $query); 

// close connection
mysqli_close($link);

header('Location: myClass.php');

?>