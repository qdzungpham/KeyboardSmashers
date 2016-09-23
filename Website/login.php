<?php
//login.php when the login button click
require "connect.inc";
 if (isset($_POST['login'])){
 $username=$_POST['username'];
 $password=$_POST['password'];

 if (preg_match("/^t/", $username, $match)){
  $roll = "teacher";
  $qurey = "SELECT * FROM `teacherlogin` WHERE teacherUsername = '$username'";
  
 }

else if (preg_match("/^n/", $username, $match)){
  $roll = "student";
  $qurey = "SELECT * FROM `studentlogin` WHERE studentUsername = '$username'";
  
  
 }
 else {
  $qurey = "SELECT * FROM `teacherlogin` WHERE teacherID = '0'";
 }
  //check the input then send the correct data to a sql query
$results = $conn->prepare($qurey);
$results -> execute();
$row = $results->FetchALL(PDO::FETCH_ASSOC);
// if loop to check the the correction of username and password from database
if (count($row)==1)
{
	foreach($row as $data)
	{
		if ($data['Password'] == $password)
		{
			if ($roll == "student")
			{
				$_SESSION["UserID"] = $data['studentID'];
				$_SESSION["UserName"] = $data['studentUsername'];
				header('location: portal/index.php');
		    }
		 	else if ($roll == "teacher")
		 	{
				$_SESSION["UserID"] = $data['teacherID'];
				$_SESSION["UserName"] = $data['teacherUsername'];
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
// error message when the user put in the wrong username
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
