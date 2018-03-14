<?php $title = "About Teacher Tools"; include 'header.php';?>

	<p>This tool is our project for a Computer Science class.<br>We created a LCMS that will allow any educators to create courses of any subject.</p>
	<p>If you want to teach a cooking class, you can do it here.<br>If you want to teach a chemistry class, that would be easy too!</p>
	<p>You can upload files, create tests and labs, assign homework and keep track of all scores.</p>
	<p>The developers are:</p>
	<ul>
		<li>Nicole</li>
		<li>Eli</li>
		<li>Louie</li>
		<li>Malcom</li>
		<li>Jack</li>
		<li>Tatiana</li>
	</ul>

<a href="https://www.visualstudio.com/downloads/?id2=546" title="Download Memory Game"target="_blank"onClick="javascript:document.location.reload(true)">Download</a>
<a href="Signup.php?id=546" title="Download Memory Game"target="_blank"onClick="javascript:document.location.reload(true)">Test Download</a>


<a href="http://www.google.com" target="blank" onClick="javascript:document.location.reload(true)">Click here</a> 

<?php

$lin=$_GET['id2'];


  
  if ($lin==546)
    {
    echo "Return Code:";
    }
  else
    {
    echo "Upload: ";
    }

    

?>



<?php include 'footer.php';?>
