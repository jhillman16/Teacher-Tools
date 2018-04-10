<?php $title = "Teacher Tools"; include 'header.php';?>


<?php $cors_location = "cloudinary_cors.html"; ?>

<form enctype="multipart/form-data" action="testUpload-script.php" method="POST">

	<?php echo cl_image_upload_tag('image_id', array("callback" => $cors_location)); ?>

    Send this file: <input id="userfile" type="file" name="fileupload" />

    <input type="submit" value="Send File" />

</form>




<?php include 'footer.php';?>