<?php
//login.php when the login button click
require "connect.inc";
 if (isset($_POST['login'])){
 $username=$_POST['username'];
 $password=hash('sha256', $_POST['password']);

 if (preg_match("/^t/", $username, $match)){
  $roll = "teacher";
  $qurey = "SELECT * FROM `teacherlogin` WHERE `teacherUsername` = '$username'";
  
 }

else if (preg_match("/^n/", $username, $match)){
  $roll = "student";
  $qurey = "SELECT * FROM `studentlogin` WHERE `studentUsername` = '$username'";
  
 }
 else if (preg_match("/^m/", $username, $match)){
  $roll = "manager";
  $qurey = "SELECT * FROM `manager` WHERE `Username` = '$username'";
  
 }
 else {
  $qurey = "SELECT * FROM `teacherlogin` WHERE `teacherID` = '0'";
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
				$id=$data['studentID'];
				$_SESSION["UserID"] = $id;
				$_SESSION["UserName"] = $data['studentUsername'];
				$_SESSION["Roll"] = $roll;
				$sql = "SELECT * FROM `students` WHERE studentID = '$id'";
				$rs = $conn->prepare($sql);
				$rs -> execute();
				$record = $rs->FetchALL(PDO::FETCH_ASSOC);
				foreach($record as $info)
				{				
					$_SESSION["Name"] = $info['firstName']." ".$info['familyName'];
				}
				header('location: portal/index.php');
		    }
		 	else if ($roll == "teacher")
		 	{
		 		$id=$data['teacherID'];
				$_SESSION["UserID"] = $data['teacherID'];
				$_SESSION["UserName"] = $data['teacherUsername'];
				$_SESSION["Roll"] = $roll;
				$sql = "SELECT * FROM `teachers` WHERE teacherID = '$id'";
				$rs = $conn->prepare($sql);
				$rs -> execute();
				$record = $rs->FetchALL(PDO::FETCH_ASSOC);
				foreach($record as $info)
				{				
					$_SESSION["Name"] = $info['firstName']." ".$info['familyName'];
				}
				header('location: portal/teacherportal/index.php');
			}
			else if ($roll == "manager")
			{
				 $id=$data['id'];
				 $_SESSION["UserID"] = $id;
                 $_SESSION["manager"]='1';
                 $_SESSION["Roll"] = $roll;
                 $_SESSION["UserName"] = $data['Username'];
                  header('location: manager/main.php');

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
