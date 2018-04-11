<html>
 <head> <title>Carrie's PHP Discussion Board </title> </head>
 <body>
  <h2> Carrie's Discussion Board </h2>
  
  Add to the discussion:
  <form method="post" action="CLDiscussionBoard.php">
    <textarea name="comment" rows="4" cols="56"> Add your comment... </textarea>  <br />
    
    Username: <input name="uname" type="text" /> 
    <!--Password: <input name="pword" type="password"/> <br /> -->
    <input type="submit" name="submit" value="Post Comment"/>
  </form> 
</body>
</html>



<?php
      $username=$_POST['uname'];
      $yourComment=$_POST['comment'];
    $myTextData="textData.txt";//sets file name
    $fullContents=file_get_contents($myTextData);//sets fullContents to string of everything that is in the text file
    $arrayOfAllComments=unserialize($fullContents);//taking the string of all of the comments and makes in an array of all comments
      //$arrayOfAllComments=array(); //THIS IS A TRICK FOR THE FIRST COMMENT 
if(isset($username)&&isset($yourComment)){
       
      date_default_timezone_set('America/New_York');
      $today = date("F j, Y, g:i a");
  
      $fullCurrCommentInfo=array($username,$today,$yourComment);//makes array of one comment
//THIS WOULD BE IF THEY SUBMIT THINGS
  
      
           array_push($arrayOfAllComments,$fullCurrCommentInfo);//adds array of current comments to all of the comments
        
      $commentInfoString=serialize($arrayOfAllComments);//makes the array of all of the comments into a string
      
      file_put_contents($myTextData,$commentInfoString);//puts the serialized content back into the txt file 
}  
     $arrayOfAllComments = array_reverse($arrayOfAllComments);
      foreach ($arrayOfAllComments as $commentArray) {//$commentArray is the current comment to print
        echo('<p>'.$commentArray[0]." posted at ".$commentArray[1].":".'</p>'); 
        echo('<p>'.'<td>'.'<strong>'.$commentArray[2].'</strong>'.'</td>'.'</p>');
        echo('<p>............................................................................................................</p>');
      }
  ?>
