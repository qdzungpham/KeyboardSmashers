<?php 
require "connect.inc";
if(isset($_POST['submit']))
{
 $firstName=$_POST['firstName'] ;
 $lastName=$_POST['lastName'] ;
 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/CVs/";
 
 if(move_uploaded_file($file_loc,$folder.$file))
 {

echo hash('sha256', $firstName);
  /*$sql="INSERT INTO `files`(`class_name`,`lesson_description`,`file_name`,`file_type`,`file_size`,`date_upload`) VALUES('$class','$lesson','$file','$file_type','$file_size','$date')";
  $rs= $conn->prepare($sql);
  $rs->execute(); */
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
	<input type="text" name="firstName" placeholder="firstName"><br>
	<input type="text" name="lastName" placeholder="lastName"><br>
	<input type="number" name="phone" placeholder="phoneNumber"><br>
	<input type="email" name="email" placeholder="email"><br>
	<input type="text" name="steet" placeholder="Street"><br>
	<select name = "state">
		<option value = "QLD">QLD</option>
		<option value = "VIC">VIC</option>
	</select><br>
	<input type="file" name="file"><br>
	<input type="text" name="suburb" placeholder="suburb"><br>
	<input type="submit" name="submit" value = "submit">

</form>
</body>
</html>