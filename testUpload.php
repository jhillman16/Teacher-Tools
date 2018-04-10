<?php $title = "Teacher Tools"; include 'header.php';?>



<?php

	include 'src/Cloudinary.php';
	include 'src/Uploader.php';
	if (file_exists('settings.php')) {
	  include 'settings.php';
	}

if(isset($_SESSION['StudentID']))
	$tag_name = $_SESSION['StudentID']);
else if(isset($_SESSION['TeacherID']))
	$tag_name = $_SESSION['TeacherID']);
else
	$tag_name = "";

	echo "<p>Tag name is: " . $tag_name . ".</p>";

if (!empty($tag_name))
{

	$sample_paths = array(
	  "pizza" => getcwd(). DIRECTORY_SEPARATOR . "images/class.jpg",
	  "lake" => getcwd(). DIRECTORY_SEPARATOR . "images/logo.png",
	); // array


	$default_upload_options = array("tags" => "basic_sample");
	$eager_params = array("width" => 200, "height" => 150, "crop" => "scale");
	$files = array();
	# This function, when called uploads all files into your Cloudinary storage and saves the
	# metadata to the $files array.
	function do_uploads() {
	  global $files, $sample_paths, $default_upload_options, $eager_params;
	  
	  # public_id will be generated on Cloudinary's backend.
	  $files["unnamed_local"] = \Cloudinary\Uploader::upload($sample_paths["pizza"],
	    $default_upload_options);
	  
	  # Same image, uploaded with a public_id
	  $files["named_local"] = \Cloudinary\Uploader::upload($sample_paths["pizza"],
	    array_merge($default_upload_options, array("public_id" => "custom_name")));
	  # Eager transformations are applied as soon as the file is uploaded, instead of waiting
	  # for a user to request them. 
	  $files["eager"] = \Cloudinary\Uploader::upload($sample_paths["lake"],
	    array_merge($default_upload_options, array(
	      "public_id" => "eager_custom_name",
	      "eager" => $eager_params,
	    ) // array
	  )); // array_merge, upload
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


      echo "<h1>Cloudinary - Basic PHP Sample";
      echo "<h2>Uploading ... </h2>";
      do_uploads();
      echo "<h3>... Done uploading!</h3>";

    

      show_image($files["unnamed_local"], 
        array("width" => 200, "height" => 150, "crop" => "fill"), "Local file, Fill 200x150");
		
      show_image($files["named_local"],  
        array("width" => 200, "height" => 150, "crop" => "fit"), "Local file, custom public ID, Fit into 200x150");
		
      show_image($files["eager"], $eager_params, "Local file, Eager trasnformation of scaling to 200x150");
	  
      show_image($files["remote"],  
        array("width" => 200, "height" => 150, "crop" => "thumb", "gravity" => "faces"), 
        "Uploaded remote image, Face detection based 200x150 thumbnail");
		
      show_image($files["remote_trans"],  
        array("width" => 200, "height" => 150, "crop" => "fill", "gravity" => "face", "radius" => 10, "effect" => "sepia"),
        "Uploaded remote image, Fill 200x150, round corners, apply the sepia effect");
}
else
	echo "<p>Something's not quite right.</p>"

?>




<?php include 'footer.php';?>