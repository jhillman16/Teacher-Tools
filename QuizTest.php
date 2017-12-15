<?php $title = "Quiz"; include 'header.php';?>
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


<p class="question">1. What is the engine code of the third and fourth generation Subaru Impreza WRX STI?</p>
<ul class="answers">
<input type="radio" name="q1" value="a" id="q1a"><label for="q1a">EJ257</label><br/>
<input type="radio" name="q1" value="b" id="q1b"><label for="q1b">4A-GE</label><br/>
<input type="radio" name="q1" value="c" id="q1c"><label for="q1c">J35Z2</label><br/>
<input type="radio" name="q1" value="d" id="q1d"><label for="q1d">1UZ-FE</label><br/>
</ul>

<p class="question">2. What is the chasis code of the fourth generation Toyota Supra?</p>        

<ul class="answers">            
<input type="radio" name="q2" value="a" id="q2a"><label for="q2a">AE86</label><br/>           
<input type="radio" name="q2" value="b" id="q2b"><label for="q2b">A40</label><br/>            
<input type="radio" name="q2" value="c" id="q2c"><label for="q2c">S13</label><br/>           
<input type="radio" name="q2" value="d" id="q2d"><label for="q2d">A80</label><br/>       
</ul>        


<p class="question">3. Which of these engines have the highest redline?</p>        

<ul class="answers">            
<input type="radio" name="q3" value="a" id="q3a"><label for="q3a">RB26DETT</label><br/>            
<input type="radio" name="q3" value="b" id="q3b"><label for="q3b">4G63</label><br/>            
<input type="radio" name="q3" value="c" id="q3c"><label for="q3c">F20C</label><br/>           
<input type="radio" name="q3" value="d" id="q3d"><label for="q3d">LS1</label><br/>       
</ul>

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