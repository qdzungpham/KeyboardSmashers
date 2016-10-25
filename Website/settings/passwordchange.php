<?php 
require "../connect.inc";
if(isset($_POST['submit']))
{
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$privatekey="6Ld5PwgUAAAAAMwNvdd5t1hkxNuToF7E93Nu8GlN";

	$response=file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$data = json_decode($response);
	 $username=$_POST['username'];
	 $newpassword=hash('sha256',$_POST['newpassword']);
	 if(isset($data->success) AND $data->success ==true)
	 {
		 if (preg_match("/^t/", $username, $match)){
		 	$roll="teacher";
		  $qurey = "SELECT * FROM `teacherlogin` WHERE `teacherUsername` = '$username'";
		 }

		else if (preg_match("/^n/", $username, $match)){
		$roll="student";
		  $qurey = "SELECT * FROM `studentlogin` WHERE `studentUsername` = '$username'";
		 }
		 else if (preg_match("/^m/", $username, $match)){
		 	$roll="manager";
		  $qurey = "SELECT * FROM `manager` WHERE `Username` = '$username'";
		 }
		$results = $conn->prepare($qurey);
		$results -> execute();
		$row = $results->FetchALL(PDO::FETCH_ASSOC);
		if(count($row==1))
		{
		  if(!empty($_POST['newpassword']))
		  {
           if($roll == 'teacher')
           {
              $query="UPDATE `teacherlogin` set `Password`='$newpassword'
                      WHERE `teacherUsername`= '$username'";
           }
           if($roll == 'student')
           {
              $query="UPDATE `studentlogin` set `Password`='$newpassword'
                      WHERE `studentUsername`= '$username'";
           }
           if($roll == 'manager')
           {
              $query="UPDATE `manager` set `Password`='$newpassword'
                      WHERE `Username`= '$username'";
           }
            $rs = $conn->prepare($query);
			$rs -> execute();
			echo "<script>
			alert('Password Updated');
			</script>";
			header('location: ../home.php');
		   }
		   else{
		   	echo "Password can not be empty";
		   }
		}
		else {
			echo "Invalide Username" ;
		}
	}
	else{
           echo "Check not pass" ;
	}



}
if(isset($_POST['back'])){
	header('location: ../home.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Change</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link href="../css/mycss.css" rel="stylesheet" type="text/css" >
  
  <link rel="stylesheet" href="../portal/plugins/iCheck/square/blue.css">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../portal/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../portal/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../portal/dist/css/skins/_all-skins.min.css">
</head>
<body>
<div class="col-md-3" style="margin-top: 100px; margin-left: 40%;">
<form method="post">
 <div class="box-header with-border">
    <h2 class="box-title">Change password</h2>
 </div>
   <div class="form-group">
       <input type="text" class="form-control" placeholder="Username"
       name="username" required>
   </div>
   <div class="form-group has-feedback">
       <input type="password" class="form-control" placeholder="Password"
       name="newpassword" required>
   </div>
   <div class="form-group has-feedback">
   <div class="g-recaptcha" data-sitekey="6Ld5PwgUAAAAAL4HXl4BeHw6WdK0rcXzXaWi20jL"></div>
   </div>
   <input type="submit" class="btn btn-primary" name="submit" value="Submit">
   <a href="../home.php" class="btn btn-success">Back</a>
 </form>
</div>
</body>
</html>