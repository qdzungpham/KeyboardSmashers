<!-- <?php 
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
</html> -->
<!DOCTYPE html>
<html>
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<title>Popup contact form</title>
<link href="css/elements.css" rel="stylesheet">
<script >
	
	function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
</script>
</head>
<!-- Body Starts Here -->
<body id="body" style="overflow:hidden;">
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="#" id="form" method="post" name="form">
<img id="close" src="images/3.png" onclick ="div_hide()">
<h2>Contact Us</h2>
<hr>
<input id="name" name="name" placeholder="Name" type="text">
<input id="email" name="email" placeholder="Email" type="text">
<textarea id="msg" name="message" placeholder="Message"></textarea>
<div class="g-recaptcha" data-sitekey="6Ld5PwgUAAAAAL4HXl4BeHw6WdK0rcXzXaWi20jL"></div>
<a href="javascript:%20check_empty()" id="submit">Send</a>
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button -->
<h1>Click Button To Popup Form Using Javascript</h1>
<button id="popup" onclick="div_show()">Popup</button>
</body>
<!-- Body Ends Here -->
</html>