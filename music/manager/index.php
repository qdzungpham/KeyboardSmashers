
<?php

require '../connect.inc';   
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * FROM `manager` WHERE `username`='$username'";
$results = $conn->prepare($query);
$results -> execute();
$row = $results->FetchALL(PDO::FETCH_ASSOC);
if (count($row)==1){
  foreach($row as $data){
    if($data['password'] == $password){
    	$_SESSION["manager"]='1';
      header('location: main.php');
    }
    else {echo "Wrong password"; }
  }
}
else { echo "Wrong username";}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Login
</title>
</head>
<body>
<form method="post" action="index.php">
<input type="text" placeholder="username" name="username">
<input type="text" placeholder="password" name="password">
<input type="submit" value="login" name="login">
</form>
</body>
</html>