<!DOCTYPE html>
<html>

<head> 

<title> "Signup Page" </title>
<meta charset = "UTF-8">

</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Welcome </h1>
<h2> Sign Up </h2>


<body>

<form class="pure-form">
    
    Fist Name:<br>
    <input type="firstname" placeholder="First Name" id="firstname" required><br><br>
    
    Last Name:<br>
    <input type="lastname" placeholder="Last Name" id="lastname" required><br><br>
    
    User Name:<br>
    <input type="username" placeholder="User Name" id="username" required><br><br>
    
    Password:<br>
    <input type="password" placeholder="Password" id="password" required>
    <input type="password" placeholder="Confirm Password" id="confirm_password" required> <br><br>
        
    Email:<br>
    <input type="email" placeholder="Email" id="email" required>
    <input type="email" placeholder="Confirm Email" id="confirm_email" required> <br><br>
    
    <input type="radio" name="gender" value="male"> Student
    <input type="radio" name="gender" value="female"> Educator<br><br>
    
    <button type="submit" class="pure-button pure-button-primary">Confirm</button>
    
</form>



<?php
$servername = "http://acadweb1.salisbury.edu/~mmilton1/connect.php";
$username = "mmilton1";  //your user name for php my admin if in local most probaly it will be "root"
$password = "malcmalc3";  //password probably it will be empty
$databasename = "mmilton1DB"; //Your db nane
// Create connection
$conn = new mysqli($servername, $username, $password,$databasename);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$query="SELECT * FROM StudentsUser";
if($r=mysql_query($query)){
    echo "dummy1\n";
    print "<p> {$row[FirstName']} </p>\n";
?>

</body>

</html>