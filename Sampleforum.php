<html>
<body>
<?php require("nav.php");   ?>
<form method="post" action="commentAction.php">
  <div id="content">
   
   <table>
   
   <tr><td> <h1> FORUM </h1> </td></tr>
   
   <!-- PRINTING THE NEWS ORDERED BY DATE WITH THE FIRST 100 WORDS -->
   <?php
      $topic = $_GET['f'];
	  $user = $_GET['u'];
	  $id = $_GET['id'];
	  
      $connection = mysql_connect('localhost', 'oaboul-enein1', 'oaboul-enein1');
      if(!$connection){
		  echo "<span class=\"error\"><p> ERROR WHILE CONNECTING TO THE DATABASE </p></span>";
	  }else{
		  mysql_select_db("oaboulenein1DB", $connection);
		  $query = "SELECT text, datePosted, timePosted, title,upVotes, downVotes FROM Forum WHERE forumID='$id'";
		  $r = mysql_query($query);
		  $row = mysql_fetch_array($r);		  
		  
		  // RESULT WILL BE ONE ROW
		  echo "<tr><td><h3>".$topic." </h3></a></td>";
		  echo "<td><p> by ".$user." </p></td>";
		  echo "<td><p> posted: ".$row['datePosted']." ".$row['timePosted']."</p></td>";
		  echo "</tr>";
		  echo "<tr><td colspan=3><a href=#>About ".$row['title']."</a></td></tr>";
		  $uv = $row['upVotes'];
		  if($uv==null) { $uv = 0; }
		  $dv = $row['downVotes'];
		  if($dv==null) { $dv = 0; }
		  echo "<td colspan=3><p>Likes: ".$uv." Dislikes: ".$dv."</p></td></tr>";
		  echo "<tr><td class=\"padding\" colspan=3><p>".nl2br($row["text"])."</p></td></tr>";
		  
		  // Now we show the comments related to this forum
		  $q = "SELECT text, datePosted, timePosted, upVotes, downVotes, gamerUserName FROM Comment WHERE forumID='$id'";
		  $res = mysql_query($q);
		  if(mysql_affected_rows()>0) { echo "<tr><td colspan=3><h4>Comments </h4></a></td>"; }
		  while($row=mysql_fetch_array($res)) {
			  echo "<tr><td colspan=3><p class=\"user\">".$row['gamerUserName']."</p></td></tr>";
			  echo "<tr><td colspan=3><p>".$row['datePosted']." ".$row['timePosted']."</p></td></tr>";
			  $uv = $row['upVotes'];
		      if($uv==null) { $uv = 0; }
		      $dv = $row['downVotes'];
		      if($dv==null) { $dv = 0; }
		      echo "<td colspan=3><p class=\"likes\">Likes: ".$uv." Dislikes: ".$dv."</p></td></tr>";
			  echo "<tr><td colspan=3><p class=\"text\">".$row['text']."<p></td></tr>";
			  
		  }
		  echo "<tr><td class=\"padding\" colspan=3></td></tr>";
		  //echo "<tr><td colspan=3><textarea name=\"texto\" rows=10 cols=600></td></tr>"; 
		  
	  }	  
   ?>
   <tr><td colspan=3><textarea name="texto" rows=10 cols=150>Comment...</textarea></td></tr>
   <tr><td colspan=3><input class="button" type="submit" value="Comment"></td></tr>
   
   </table>
 </div>
 </form>
 </body>
 
   
 </html>
	  
