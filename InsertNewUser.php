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
$FirstName  = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$LastName   = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$UserName   = mysqli_real_escape_string($link, $_REQUEST['username']);
$Password   = mysqli_real_escape_string($link, $_REQUEST['password']);
$ConfirmPassword    = mysqli_real_escape_string($link, $_REQUEST['confirm_password']);
$Email      = mysqli_real_escape_string($link, $_REQUEST['email']);
$ConfirmEmail       = mysqli_real_escape_string($link, $_REQUEST['confirm_email']);
$TeacherStudent = mysqli_real_escape_string($link, $_REQUEST['ans']);

if($Password != $ConfirmPassword){
    header('Location: Signup.php');
    mysqli_close($link);
}

// attempt insert query execution
if($TeacherStudent == "student")
{
    $query = "INSERT INTO StudentsUser (Username, Password, FirstName, LastName, Email, JoinedDate) 
            VALUES ('$UserName', '$Password', '$FirstName', '$LastName', '$Email', '2017-10-05')";
}
elseif ($TeacherStudent == "teacher") {
    $query = "INSERT INTO TeacherUser (Username, Password, FirstName, LastName, Email, JoinedDate) 
            VALUES ('$UserName', '$Password', '$FirstName', '$LastName', '$Email', '2017-10-05')";
}

if(mysqli_query($link, $query)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
header('Location: Creat.html');

// close connection
mysqli_close($link);

?>