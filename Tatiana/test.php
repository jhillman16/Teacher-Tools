<?php $title = "File Upload"; include 'header.php';?>


<?php

$allowedExts = array("jpg", "jpeg", "gif", "png", "txt");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "<p>Upload: " . $_FILES["file"]["name"] . "</p>";
    echo "<p>Type: " . $_FILES["file"]["type"] . "</p>";
    echo "<p>Size: " . ($_FILES["file"]["size"] / 1024) . " Kb</p>";
    echo "<p>Temp file: " . $_FILES["file"]["tmp_name"] . "</p>";

    if (file_exists("temp/" . $_FILES["file"]["name"]))
      {
      echo "<p>" . $_FILES["file"]["name"] . " already exists.</p>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "temp/" . $_FILES["file"]["name"]);
      echo "<p>Stored in: " . "temp/" . $_FILES["file"]["name"] . "</p>";
      }
    }
  }
else
  {
  echo "<p>Invalid file</p>";
  }

?>



<?php include 'footer.php';?>