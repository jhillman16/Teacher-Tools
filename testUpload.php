<?php $title = "Teacher Tools"; include 'header.php';?>



<?php

// change
echo 'Current PHP version: ' . phpversion();

if (isset($_POST["submit"])) {
    print_r($_FILES["fileToUpload"]);
    $cloudUpload = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]['tmp_name']);
    print_r($cloudUpload);
}
?>

<?php echo cl_unsigned_image_upload_tag('zcudy0uz', 
    $upload_preset, array("cloud_name" => "hzpnyxrng", "tags" => "test_upload")); ?>

<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/vendor/jquery.ui.widget.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.iframe-transport.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.5/js/jquery.fileupload.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery-file-upload/2.1.2/cloudinary-jquery-file-upload.js"></script>
<?php echo cloudinary_js_config(); ?>





<?php

$cloudName = "hzpnyxrng";
$apiKey = "663542711141867";
$time = time();
$apiSecret = "3umXJKOqo-t332Cn3njsa-c7Fkc";
$fileName = "file_name";

?>

<form action="https://api.cloudinary.com/v1_1/<?php echo $cloudName;?>/image/upload" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"><br>
    <input type="hidden" name="signature" value="<?php echo sha1('public_id='.$fileName.'&timestamp='.$time.$apiSecret);?>" />
    <input type="hidden" name="api_key" value="<?php echo $apiKey; ?>"/>
    <input type="hidden" name="public_id" value="<?php echo $fileName; ?>" />
    <input type="submit" name="submit" value="Submit">
</form>
-->

<?php /*
include 'src/Cloudinary.php';
include 'src/Uploader.php';
\Cloudinary\Uploader::unsigned_upload("sample.jpg", "toofghxs",
    array("public_id" => "sample_id"));

\Cloudinary\Uploader::unsigned_upload("sample.jpg", "toofghxs", 
    array(
    	"cloud_name" => "hzpnyxrng",
    	"public_id" => "sample_id"
    ));
*/?>





<?php include 'footer.php';?>