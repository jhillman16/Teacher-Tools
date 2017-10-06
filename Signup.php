<!DOCTYPE html>
<html>


<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & E_NOTICE);

if($connection=@mysql_connect("http://acadweb1.salisbury.edu/~mmilton1/connect.php", "mmilton1", "malcmalc3")){
    <p>Successfully connected to MYSQL.</p>
}else{
    die('<p>Could not connect to MYSQL because:<b>'.mysql_error().'</b></p>');
}

if(@mysql_select_db("mmilton1DB", $connection)){
    print'<p>The mmilton1DB has been selected</p>';
}

$query="SELECT * FROM StudentsUser";
if($r=mysql_query($query)){
    echo "dummy1\n";
    print "<p> {$row['FirstName']} </p>\n";
}

?>

</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Welcome </h1>
<h2> Sign Up </h2>



</html>