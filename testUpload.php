<?php $title = "Teacher Tools"; include 'header.php';?>




<?php echo cloudinary_js_config(); ?>

<script>
$(function() {
  if($.fn.cloudinary_fileupload !== undefined) {
    $("input.cloudinary-fileupload[type=file]").cloudinary_fileupload();
  }
});

if (array_key_exists('REQUEST_SCHEME', $_SERVER)) {   
  $cors_location = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] .
    dirname($_SERVER["SCRIPT_NAME"]) . "/cloudinary_cors.html";
} else {
  $cors_location = "https://" . $_SERVER["HTTP_HOST"] . "/cloudinary_cors.html";
}

</script>

<form action="uploaded.php" method="post">
  <?php echo cl_image_upload_tag('image_id', array("callback" => $cors_location)); ?>
</form>





<?php include 'footer.php';?>