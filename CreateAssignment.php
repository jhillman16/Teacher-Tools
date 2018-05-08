<?php
$title = "Create Assignment";
include 'header.php';
include 'checkSession.php';

if(!isset($_SESSION['CourseID']))
{
	echo '<script>';
	echo 'window.location.replace("myClass.php");';
	echo '</script>';
}
?>

<form method="post" action="CreateAssignmentScript.php">

    <div>
        <label><span>Assignment Name:</span>
            <input type="text" placeholder="Assignment 1" name="assignName" required />
        </label>
    </div>

    <div>
        <label><span>Assignment Description:</span>
            <input type="text" placeholder="This is the first assignment" name="assignDesc" />
        </label>
    </div>

    <div>
        <label><span>Points:</span>
            <input id="points" type="number" step="1" placeholder="Enter a whole number" name="points" required />
        </label>
    </div>

    <div>
        <label><span>Link to Files:</span>
            <input type="text" placeholder="Google Drive Link" name="fileLink" />
        </label>
    </div>

    <div>
        <label><span>Category Name:</span>
            <input type="text" placeholder="Homework" name="categoryName" required/>
        </label>
    </div>

    <div>
        <label><span>Due Date:</span>
            <input type="datetime-local" name="dueDate" required/>
        </label>
    </div>

    <div>
        <label>
            Allow retakes?
            <span>
                <input type="radio" name="retake" id="yes" value="yes" /> Yes
            </span>
            <span>
                <input type="radio" name="retake" id="no" value="no" /> No
            </span>
        </label>
    </div>

    <div>
        <input type="submit" value="Submit" />
    </div>

</form>

<?php
        if(isset($_SESSION['Error']))
        {
            $error = $_SESSION['Error'];
            session_unset($_SESSION['Error']);
            $color = "green";
            echo '<div style="color:'.$color.'">'.$error.'</div>';
        }
        ?>

<?php include 'footer.php';?>
