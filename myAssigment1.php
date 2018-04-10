<?php $title = "My Classes"; include 'header.php';?>


<li>
	<a href="#">See other assignments</a>
</li>

	 <body>
	<br> 
<h3>File upload </h3>
<p style="font-family:courier;">Select File</p>
<form action ="#" method = "post" enctype="multipart/form-data">
<input type="file" name ="file" size = "500" >
<input type ="submit" name="T1" value = "Upload File">


<br>

<html>
    <head>
        <script type="text/javascript">
            function greeting(){
                alert("Welcome " + document.forms["frm1"]["fname"].value + "!")
            }
        </script>
    </head>
    <body>

        What is your name?<br />
        <form name="frm1" action="submit.htm" onsubmit="greeting()">
            <input type="text" name="fname" />
            <input type="submit" value="Submit" />
        </form>

    </body>
</html> 


</body>




<?php include 'footer.php';?>