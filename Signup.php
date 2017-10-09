<!DOCTYPE html>
<html>

<head> 

<title> "Signup Page" </title>
<meta charset = "UTF-8">

</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Welcome </h1>
<h2> Sign Up </h2>

<?php
$link = mysqli_connect("localhost", "mmilton1", "mmilton1", "mmilton1DB");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
?>

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
    
    <input type="radio" name="student" value="student"> Student
    <input type="radio" name="gender" value="teacher"> Educator<br><br>
    
    <button type="submit" class="pure-button pure-button-primary">Confirm</button>
    
</form>

</body>

</html>