<?php $title = "File Upload"; include 'header.php';?>

<?php
$linkName=$_POST['email'];
?>
<a href="<?=$linkName?>" target="_blank">Link 1</a>
<br>

<?php
echo $_POST['username'];
echo "\n";
echo $linkName;
?>
<br>
<br>

 <a href="UploadFiles2.php">Return to "Upload Page"</a>

<?php include 'footer.php';?>