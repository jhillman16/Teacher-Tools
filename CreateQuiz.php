<?php $title = "Create Quiz"; include 'header.php';?>

<form method="post" action="CreateQuizScript.php">

<div>
<label><span>Quiz Name:</span>
<input type="text" placeholder="Quiz 1" name="quizname" required />
</label>
</div>

<div>
<label><span>Quiz Description:</span>
<input type="text" placeholder="This is the first quiz" name="quizdescription" />
</label>
</div>

<div>
<input type="submit" value="Submit" />
</div>
   
</form>

<?php include 'footer.php';?>