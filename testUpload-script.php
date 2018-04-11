<?php $title = "upload pg 2"; include 'header.php';?>

<?php


include 'src/Cloudinary.php';
include 'src/Uploader.php';
if (file_exists('settings.php')) {
    include 'settings.php';
}

if(isset($_SESSION['StudentID']))
  $tag_name = "student"; //$_SESSION['StudentID']);
else if(isset($_SESSION['TeacherID']))
  $tag_name = "teacher"; //$_SESSION['TeacherID']);
else
  $tag_name = "";


$extension = $_FILES['fileupload']['name'];


if (!empty($tag_name))
{
    echo "<p>Tag name is: " . $tag_name . ".</p>";

    /*$sample_paths = array(
        "pizza" => getcwd(). DIRECTORY_SEPARATOR . "images/class.jpg",
        "lake" => getcwd(). DIRECTORY_SEPARATOR . "images/logo.png",
    );*/ // array


    $default_upload_options = array("tags" => $tag_name);
    $eager_params = array("width" => 200, "height" => 150, "crop" => "scale");
    $files = array();

    # This function, when called uploads all files into your Cloudinary storage and saves the
    # metadata to the $files array.
    function do_uploads() {
        global $files, $sample_paths, $default_upload_options, $eager_params;

        echo "<p>In do_uploads.</p>";

        echo $extension;

        # public_id will be generated on Cloudinary's backend.
        //$files["unnamed_local"] = \Cloudinary\Uploader::upload($sample_paths["pizza"], $default_upload_options);

        # Same image, uploaded with a public_id
        $files["named_local"] = \Cloudinary\Uploader::upload($extension,
          array(
            //"public_id" => "custom_name",
            "use_filename" => TRUE,
            "resource_type" => "auto",
            ) // array
        ); // array_merge, upload

        echo "<p>Passed upload(extension).</p>";

        # Eager transformations are applied as soon as the file is uploaded, instead of waiting
        # for a user to request them. 
        /*$files["eager"] = \Cloudinary\Uploader::upload($sample_paths["lake"],
          array_merge($default_upload_options, array(
            //"public_id" => "eager_custom_name",
            "eager" => $eager_params,
            "use_filename" => TRUE,
          ) // array
        )); // array_merge, upload*/
    } // do_uploads

    # Output an image in HTML along with provided caption and public_id
    function show_image($img, $options = array(), $caption = "") {
        $options["format"] = $img["format"];
        $transformation_url = cloudinary_url($img["public_id"], $options);

        echo "<div class='item'>";
            echo "<div class='caption'>" . $caption . "</div>";
            echo "<a href='" . $img["url"] . "' target='_blank'>" . 
                cl_image_tag($img["public_id"], $options) . "</a>";
            echo "<div class='public_id'>" . $img["public_id"] . "</div>";

        echo "<div class='link'><a target='_blank' href='" . $transformation_url . "'>" . $transformation_url . "</a></div>";
        echo "</div>";
    } // show_image


    do_uploads();



      show_image($files["named_local"],  
        array("width" => 200, "height" => 150, "crop" => "fit"), "Local file, custom public ID, Fit into 200x150");
    
      //show_image($files["eager"], $eager_params, "Local file, Eager trasnformation of scaling to 200x150");
}
else
    echo "<p>Something's not quite right.</p>"

/*
$allowedExts = array("jpg", "jpeg", "gif", "png", "txt");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 80000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("temp/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "temp/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "temp/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }


*/
?>


<?php include 'footer.php';?>