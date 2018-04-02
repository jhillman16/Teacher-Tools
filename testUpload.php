<?php $title = "Teacher Tools"; include 'header.php';?>




<?php

$cloudName = "hzpnyxrng";
$apiKey = "663542711141867";
$time = time();
$apiSecret = "3umXJKOqo-t332Cn3njsa-c7Fkc";
$fileName = "file_name";

/*\Cloudinary::config(array(
    "cloud_name" => "hzpnyxrng",
    "api_key" => "663542711141867",
    "api_secret" => "_3umXJKOqo-t332Cn3njsa-c7Fkc"
));
if (isset($_POST["submit"])) {
    print_r($_FILES["fileToUpload"]);
    $cloudUpload = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]['tmp_name']);
    print_r($cloudUpload);
}*/
?>

<form action="https://api.cloudinary.com/v1_1/<?php echo $cloudName;?>/image/upload" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"><br>
    <input type="hidden" name="signature" value="<?php echo sha1('public_id='.$fileName.'&timestamp='.$time.$apiSecret);?>" />
    <input type="hidden" name="api_key" value="<?php echo $apiKey; ?>"/>
    <input type="hidden" name="public_id" value="<?php echo $fileName; ?>" />
    <input type="submit" name="submit" value="Submit">
</form>





<?php include 'footer.php';?>