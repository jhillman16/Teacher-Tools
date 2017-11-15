<?php include 'header.php';?>

<section>
<header>
	<h1>Sign Up</h1>
</header>

<div id="content">

<?php
session_start();
?>

<form action="InsertNewUser.php" method="post">
    
    <label for="firstname">First Name:</label>
    <input type="text" placeholder="First Name" id="firstname" name="firstname" required><br><br>
    
    <label for="lastname">Last Name:</label>
    <input type="text" placeholder="Last Name" id="lastname" name="lastname" required><br><br>
    
    <label for="username">User Name:</label>
    <input type="text" placeholder="User Name" id="username" name="username" required>
    
    <?php
    if(isset($_SESSION["errorUser"]))
    {
        $error = $_SESSION["errorUser"];
        session_unset($_SESSION["errorUser"]);
        $color = "red";
        echo '<div style="Color:'.$color.'">'.$error.'</div>';
    }
    else{ echo '<br><br>'; }
    ?>
    
    <label for="password">Password:</label>
    <input type="password" placeholder="Password" id="password" name="password" required><br />
	<label for="confirm_password">Confirm Password:</label>
    <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" oninput="check(this)" required>

    <?php
    if(isset($_SESSION["errorPassword"]))
    {
        $error = $_SESSION["errorPassword"];
        session_unset($_SESSION["errorPassword"]);
        $color = "red";
        echo '<div style="color:'.$color.'">'.$error.'</div>';
    }
    else{ echo '<br><br>'; }
    ?>

    <label for="email">Email Address:</label>
    <input type="text" placeholder="Email" id="email" name="email" required><br />
    <label for="confirm_email">Confirm Email:</label>
    <input type="text" placeholder="Confirm Email" id="confirm_email" name="confirm_email" required>

    <?php
    if(isset($_SESSION["errorEmail"]))
    {
        $error = $_SESSION["errorEmail"];
        session_unset($_SESSION["errorEmail"]);
        $color = "red";
        echo '<div style="color:'.$color.'">'.$error.'</div>';
    }
    else{ echo '<br><br>'; }
    ?>
    
    <input type="radio" name="ans" id="student" value="student"> <label class="radiob" for="student">Student</label>
    <input type="radio" name="ans" id="teacher" value="teacher"> <label class="radiob" for="teacher">Educator</label><br><br>
    
    <input type="submit" value="Submit">
   
</form>

</div>

</section>

<?php include 'footer.php';?>