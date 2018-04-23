<?php $title = "upload pg 1"; include 'header.php';?>


<form action="" method="post" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;">
  <fieldset>
    <legend>Upload example</legend>
    <p>
      <label for="upload_preset"><input value="toofghxs" type="hidden" name="upload_preset" /></label>
    </p>
    <p>
      <label>Select your photo:
      <input type="file" name="file"></label>
    </p>
    
    <p>
      <input type="submit" value="Submit" />
    </p>
    <img id="uploaded">
    <div id="results"></div>
  </fieldset>
</form>
<?php/*
if(isset($_SESSION['StudentID']) || (isset($_SESSION['TeacherID'])))
{
echo '<form enctype="multipart/form-data" action="testUpload-script.php" method="POST">';
echo '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />'; // 20MB
echo 'Send this file: <input id="userfile" type="file" name="userfile" />';
echo '<input type="submit" value="Send File" />';
echo '</form>';
}
else
{
echo '<p>You must be logged in to use this feature.</p>';
$php_redir = true;
}*/
?>
<!--<p>before script</p>
<script>
$(function() {
// Configure Cloudinary
// with credentials available on
// your Cloudinary account dashboard
$.cloudinary.config({ cloud_name: 'hzpnyxrng', api_key: '663542711141867'});
// Upload button
var uploadButton = $('#submit');
// Upload button event
uploadButton.on('click', function(e){
    // Initiate upload
    cloudinary.openUploadWidget({ cloud_name: 'hzpnyxrng', upload_preset: 'toofghxs', tags: ['cgal']}, 
    function(error, result) { 
        if(error) console.log(error);
        // If NO error, log image data to console
        var id = result[0].public_id;
        console.log(processImage(id));
    });
});
})
function processImage(id) {
var options = {
    client_hints: true,
};
return '<img src="'+ $.cloudinary.url(id, options) +'" style="width: 100%; height: auto"/>';
}
//	var redir = <?php echo json_encode($php_redir); ?>;
//	if(redir)
//		window.location = 'Login.php';
</script>
<p>after script</p>-->



<?php include 'footer.php';?>