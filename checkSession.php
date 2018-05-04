<?php

if (!isset($_SESSION['StudentID']) && !isset($_SESSION['TeacherID']))
{
	echo '<script>';
	echo 'window.location.replace("Login.php");';
	echo '</script>';
}

?>