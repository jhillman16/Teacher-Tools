<?php 
$title = "Create a Category"; 
include 'header.php';

session_start();

if (!isset($_SESSION['StudentID']) || !isset($_SESSION['TeacherID']))
{
	header('Location: Login.php');
}

if(!isset($_SESSION['CourseID']))
{
    header('Location: myClass.php');
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