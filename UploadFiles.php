<?php

$uploaddir = 'images';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$uploadOk = 1;

if(isset($_POST["submit"])){
	
	$check=getimagesize($_FILES['userfile']['tmp_name']) 

if($check!=false){
	$uploadOk=1;
}
		else{
			
				$uploadOk=0l
		}

			if($uploadOk==1){
				if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
        echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
				
				
			}
				else{
					echo"Sorry, faild";
				}


?>