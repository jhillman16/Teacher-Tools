<?php

require 'Cloudinary.php';
require 'Uploader.php';
require 'Helpers.php';
require 'Api.php';

\Cloudinary::config(array(
    "cloud_name" => "hzpnyxrng",
    "api_key" => "663542711141867",
    "api_secret" => "3umXJKOqo-t332Cn3njsa-c7Fkc"
));
\Cloudinary\Uploader::upload("/Home/peonies.png");

if (isset($_POST["submit"])) {
    print_r($_FILES["fileToUpload"]);
    $cloudUpload = \Cloudinary\Uploader::upload($_FILES["fileToUpload"]['tmp_name']);
    print_r($cloudUpload);
}
else print("Hello its not working");

?>


