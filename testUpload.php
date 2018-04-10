<?php $title = "upload pg 1"; include 'header.php';?>




<form enctype="multipart/form-data" action="testUpload-script.php" method="POST">

    Send this file: <input id="userfile" type="file" name="fileupload" />

    <input type="submit" value="Send File" />

</form>




<?php include 'footer.php';?>