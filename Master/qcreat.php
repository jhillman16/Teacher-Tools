<?php
$numOfq = $_POST["numOfq"];

$i=1;
while($i<=$numOfq){
	echo"<header>";
	echo "<h3>Question ".$i."</h3>";
	echo"</header>";
	$i=$i+1;
}
?>