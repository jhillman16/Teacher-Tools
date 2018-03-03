<?php $title = "TESTING CREATING FOLDER"; include 'header.php';?>

<!-- connect to courses table in database to CourseID and TeacherID fields -->

<form method="post" action="testCreateDir.php">

<div>
<label><span>name of class:</span>
<input type="text" name="courseName" required />
</label>
</div>

<div>
<input type="submit" value="Submit" />
</div>
   
</form>



<?php include 'footer.php';?>