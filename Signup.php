<!DOCTYPE html>
<html>

<head> 

<title> "Signup Page" </title>
<meta charset = "UTF-8">

</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Welcome </h1>
<h2> Sign Up </h2>


<body background="images/mi.jpg">

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

ini_set('display_errors', 1);
error_reporting(E_ALL & E_NOTICE);

if($connection=mysql_connect("http://acadweb1.salisbury.edu", "mmilton1", "mmilton1")){
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

</body>

</html>