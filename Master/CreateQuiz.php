<?php
    $title = "Create Quiz";
    include 'header.php';

    session_start();
    if(!isset($_SESSION['CourseID']))
    {
        header('Location: myClass.php');
    }
?>

<form method="post" action="CreateQuizScript.php">

<div>
<label><span>Quiz Name:</span>
<input type="text" placeholder="Quiz 1" name="quizName" required />
</label>
</div>

<div>
<label><span>Quiz Description:</span>
<input type="text" placeholder="This is the first quiz" name="quizDescription" />
</label>
</div>

<div>
<label><span>Category Name:</span>
<input type="text" placeholder="Quizzes" name="categoryName" required/>
</label>
<?php
session_start();
if(isset($_SESSION['Error']))
{
    $error = $_SESSION['Error'];
    session_unset($_SESSION['Error']);
    $color = "red";
    echo '<div style="color:'.$color.'">'.$error.'</div>';
}
?>
</div>

<div>
<label><span>Due Date:</span>
<input type="datetime-local" name="dueDate" required/>
</label>
</div>

<div>
<input type="submit" value="Submit" />
</div>
   
</form>

<?php include 'footer.php';?>