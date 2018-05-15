<?php
include("ConnectDatabase.php");

    require_once "db.php";
    if(isset($_GET['ID'])) {
        $sql = "SELECT Mime,Data FROM Files WHERE ID=" . $_GET['ID'];
		$result = mysqli_query($link, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($link));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["Mime"]);
        echo $row["imageData"];
	}
	mysqli_close($conn);
?>