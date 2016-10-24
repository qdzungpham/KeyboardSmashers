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
	<link href="css/mycss.css" rel="stylesheet" type="text/css" >
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
<select class="div-toggle" data-target=".my-info-1">
  <option value="orange" data-show=".citrus">Orange</option>
  <option value="lemon" data-show=".citrus">Lemon</option>
  <option value="apple" data-show=".pome">Apple</option>
  <option value="pear" data-show=".pome">Pear</option>
</select>

<div class="my-info-1">
  <div class="citrus hide">Citrus is...</div>
  <div class="pome hide">A pome is...</div>
</div>
<script>
$(document).on('change', '.div-toggle', function() {
  var target = $(this).data('target');
  var show = $("option:selected", this).data('show');
  $(target).children().addClass('hide');
  $(show).removeClass('hide');
});
$(document).ready(function(){
    $('.div-toggle').trigger('change');
});
</script>
</body>
</html>