<?php $title = "upload pg 1"; include 'header.php';?>




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

<script>
$(function() {
// Configure Cloudinary
// with credentials available on
// your Cloudinary account dashboard
$.cloudinary.config({ cloud_name: 'YOUR_CLOUD_NAME', api_key: 'YOUR_API_KEY'});
// Upload button
var uploadButton = $('#submit');
// Upload button event
uploadButton.on('click', function(e){
    // Initiate upload
    cloudinary.openUploadWidget({ cloud_name: 'YOUR_CLOUD_NAME', upload_preset: 'YOUR_UPLOAD_PRESET', tags: ['cgal']}, 
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
		window.location = 'Login.php';
</script>



<?php include 'footer.php';?>