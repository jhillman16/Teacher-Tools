<?php
require 'Cloudinary.php';
require 'Uploader.php';

\Cloudinary::config(array(
    "cloud_name" => "xxxxx",
    "api_key" => "xxxxxxxxxx",
    "api_secret" => "_xxxxxxxxxxxxxx"
));

if (isset($_POST["submit"])) {
    print_r($_FILES["fileToUpload"]);
    $cloudUpload = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]['tmp_name']);
    print_r($cloudUpload);
}

?>


