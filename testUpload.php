<?php $title = "Teacher Tools"; include 'header.php';?>



<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery.ui.widget.js" type="text/javascript"></script>
<script src="jquery.iframe-transport.js" type="text/javascript"></script>
<script src="jquery.fileupload.js" type="text/javascript"></script>
<script src="jquery.cloudinary.js" type="text/javascript"></script>

<script>
$('#upload_form').append(
    // First the "upload preset string", then your cloud name
    $.cloudinary.unsigned_upload_tag('toofghxs', { cloud_name: 'hzpnyxrng' })
);

/*
    Events!
        - Update a progress bar upon "cloudinaryprogress" event
        - Add new thumbnail image to gallery when complete!
*/
$('.upload_field').unsigned_cloudinary_upload('toofghxs', 
  { cloud_name: 'hzpnyxrng', tags: 'browser_uploads' }, 
  { multiple: true }
)
.bind('cloudinaryprogress', function(e, data) { 
  $('.progress_bar').css('width', 
    Math.round((data.loaded * 100.0) / data.total) + '%'); 
})
.bind('cloudinarydone', function(e, data) {
  // Image upload complete!  Add it to gallery with nice animation!
  $('.thumbnails').append($.cloudinary.image(data.result.public_id, 
    { format: 'jpg', width: 150, height: 100, 
      crop: 'thumb', gravity: 'face', effect: 'saturation:50' } ))}
);
</script>


<!--
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