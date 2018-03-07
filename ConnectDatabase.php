<?php
    $link = mysqli_connect("yhrz9vns005e0734.cbetxkdyhwsb.us-east-1.rds.amazonaws.com[3306]", "as2ahduvdja0icyb", "r85sc1pxkna3vfeu","adzripqa87ps498t");
 
// Check connection
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>