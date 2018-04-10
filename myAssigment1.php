<?php $title = "My Classes"; include 'header.php';?>


<li>
	<a href="#">See other assignments</a>
</li>

	 <body>
	 
<h3>File upload </h3>
<html>
  <head>
    <title>Notify on Submit</title>
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label>Name: <input type="text" name="name" /></label>
      <input type="submit" value="Submit" />
    </form>
    <?php if (count($_POST)>0) echo "Form Submitted!"; ?>
  </body>
</html>


</body>




<?php include 'footer.php';?>