<?php
require "connect.inc";
 if (isset($_POST['login'])){
 $username=$_POST['username'];
 $password=$_POST['password'];
 if (preg_match("/^t/", $username, $match)){
  $roll = "teacher";
  $qurey = "SELECT * FROM `login` WHERE staff_login_id = '$username'";
  
 }

else if (preg_match("/^n/", $username, $match)){
  $roll = "student";
  $qurey = "SELECT * FROM `login` WHERE student_login_id = '$username'";
  
 }
 else {
  $qurey = "SELECT * FROM `login` WHERE staff_login_id = '$username'";
 }
$results = $conn->prepare($qurey);
$results -> execute();
$row = $results->FetchALL(PDO::FETCH_ASSOC);
if (count($row)==1)
{
	foreach($row as $data)
	{
		if ($data['password'] == $password)
		{
			if ($roll == "student")
			{
				$_SESSION["UserID"] = $data['student_login_id'];
				header('location: portal/index.php');
		    }
		 	else if ($roll == "teacher")
		 	{
				$_SESSION["UserID"] = $data['staff_login_id'];
				header('location: portal/teacherportal/index.php');
			}
		}
		else 
		{
		$error="please enter a valid Username or Password";
		echo "<script type='text/javascript'>
			alert('$error');
			window.history.go(-1);
	  	</script>";
		}
	}
}
else if (count($row)==0)
{
	 $error="please enter a valid Username or Password";
	 echo "<script type='text/javascript'>
		alert('$error');
		window.history.go(-1);
  </script>";

}
}
?>
