<?php $title = "Quiz"; include 'header.php';?>

<?php
    session_start();
    if(!isset($_COOKIE['AssignmentID']))
    {
        header('Location: myAssignments.php');
    }

include("ConnectDatabase.php"); //Goes through steps of connecting to database
?>

<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="quiz-1.js"></script>

<style>

.answers li { 
list-style: upper-alpha; 
} 

label { 
margin-left: 0.5em; 
cursor: pointer; 
} 

#results { 
background: #dddada; 
color: 000000; 
padding: 3px; 
text-align: center; 
width: 200px; 
cursor: pointer; 
border: 1px solid gray; 
}

#results:hover { 
background: #3d91b8; 
color: #ffffff; 
padding: 3px; 
text-align: center; 
width: 200px; 
cursor: pointer; 
border: 1px solid gray; 
} 

#categorylist { 
margin-top: 6px; 
display: none; 
} 

#category1, #category2, #category3, #category4, #category5, #category6, #category7, #category8, #category9, #category10, #category11 { 
display: none; 
}

#closing {
display: none;
font-style: italic;
}

</style>
</head>




<body>

<form action='QuizTestGrade.php' method='post'>
<?php
	$query = "SELECT QuizID FROM Quiz WHERE AssignmentID = " . $_COOKIE['AssignmentID'];
	unset($_COOKIE['AssignmentID']);
	$r = mysqli_query($link, $query);
	$queryRow = mysqli_fetch_array($r);
	$QuizID = $queryRow['QuizID'];
	$_SESSION['QuizID'] = $QuizID;

	$QuestionQuery = "SELECT Question, QuestionID FROM Question WHERE QuizID = $QuizID";
	
	echo "hello";
	if($r1=mysqli_query($link, $QuestionQuery))
	{
		
		while($QuestionRow=mysqli_fetch_array($r1))
		{
				echo "<p class='question'>" . ($QuestionRow['QuestionID'] +1) . ". " . $QuestionRow['Question'] . "</p>";
				echo "<ul class='answers'>";

				$QuestionID = $QuestionRow['QuestionID'];
				$GroupName = 'q' . $QuestionRow['QuestionID']; //These radio buttons for the answers will be grouped by the question number.
				$Letter = 'a';

				$ResponseQuery = "SELECT ResponseID, IsCorrect, Response FROM Response WHERE QuizID = $QuizID AND QuestionID = $QuestionID";
				$r2=mysqli_query($link, $ResponseQuery);
				
				while($ResponseRow=mysqli_fetch_array($r2))
				{
					$AnsID = $GroupName . $Letter;
					echo '<input type="radio" name=' . $GroupName . ' value=' . $Letter . ' id=' . $AnsID . ' ><label for=' . $AnsID . '>' . $ResponseRow["Response"] . '</label><br/>';
					$Letter++;
				}

				echo "</ul>";
		}
	}
	else
	{
		echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
	}

	


?>
<input type="submit">
</form>



<br/>
<div id="results">            
Submit      
</div> 

<div id="category1">
<p><strong>Question 1:</strong> The correct answer is <strong>EJ257</strong>.</p>
</div>

<div id="category2">            
<p>              
<strong>Question 2:</strong> The correct answer is <strong>A80</strong>.</p>        
</div>        

<div id="category3">            
<p>                
<strong>Question 3:</strong> The correct answer is <strong>F20C</strong>.</p>        
</div>        

<div id="category11">            
<p>                
You answered them all right!</p>        
</div>

</form>

</body>
<?php include 'footer.php';?>