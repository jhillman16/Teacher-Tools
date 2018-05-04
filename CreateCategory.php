<?php 
$title = "Create a Category"; 
include 'header.php';
include 'checkSession.php';

if(!isset($_SESSION['CourseID']))
{
	echo '<script>';
	echo 'window.location.replace("myClass.php");';
	echo '</script>';
}
?>

<form action="CreateCategoryScript.php" method="post">

<div>
<label><span>Category Name:</span>
<input type="text" placeholder="Category Name" name="categoryName" required />
</label>
</div>

<div>
<label><span>Category Percentage:</span>
<input type="text" placeholder="20.00" name="categoryPercentage" required />
</label>
</div>

<div>
<input type="submit" value="Submit" />
</div>

</form>

<?php include 'footer.php';?>