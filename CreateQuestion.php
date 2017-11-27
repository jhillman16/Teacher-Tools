<!DOCTYPE html>
<html>

<center>

<head> 
<title> Create Question </title>
<meta charset = "UTF-8">
</head>

<p><img alt="Un.jpg" src="images/Un.jpg" style="display: block; border: 1px solid #000; width: 200px; height: 200px;" /></p>
<h1> Quiz Creation </h1>

<body background="images/mi.jpg">

<form method="post" action="CreateQuestionScript.php">
    
 Question:<br>
<input type='text' placeholder='Enter your question here' style=' width:500px;' name='question'><br><br>
    

Answer option 1:<br>
<input type='text' placeholder='Enter answer option 1' name='ans0'>
<input type="hidden" name="is0" value="0">
<input id="checkBox" type="checkbox" name="is0" value="1"> Correct
    <br><br>
Answer option 2:<br>
<input type='text' placeholder='Enter answer option 2' name='ans1'>
<input type="hidden" name="is1" value="0">
<input id="checkBox" type="checkbox" name="is1" value="1"> Correct
   <br><br>
Answer option 3:<br>
<input type='text' placeholder='Enter answer option 3' name='ans2'>
<input type="hidden" name="is2" value="0">
<input id="checkBox" type="checkbox" name="is2" value="1"> Correct
<br><br>
Answer option 4:<br>
<input type='text' placeholder='Enter answer option 4' name='ans3'>
<input type="hidden" name="is3" value="0">
<input id="checkBox" type="checkbox" name="is3" value="1"> Correct<br><br>
<input type="hidden" name="cont" value="0"> <br> <br>
<input id="checkBox" type="checkbox" name="cont" value="1"> Finish

<input type="submit" name="submit" value="Submit Question">


 
</form>

<center>

</body>
</html>