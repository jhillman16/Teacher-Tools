<?php
require 'Cloudinary.php';
require 'Uploader.php';

\Cloudinary::config(array(
    "cloud_name" => "hzpnyxrng",
    "api_key" => "663542711141867",
    "api_secret" => "_3umXJKOqo-t332Cn3njsa-c7Fkc"
));

if (isset($_POST["submit"])) {
    print_r($_FILES["fileToUpload"]);
    $cloudUpload = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]['tmp_name']);
    print_r($cloudUpload);
}

?>


