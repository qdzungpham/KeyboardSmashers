<?php
require '../connect.inc'; 
if (!isset($_SESSION["manager"]))
  {
    header('location:../home.php');
  } 
if (isset($_POST['approve'])){
	
    $enrolled=$_POST['id'];
	$query="UPDATE `students` SET `enroled`='Y' WHERE `studentID`='$enrolled'";
	$rs=$conn->prepare($query);
	$rs->execute();


	$t=time();
	$time = $t.rand(0,9);
	$username = 'n'.substr($time,4,11);
	$password = uniqid();
	$sql= "INSERT INTO `studentlogin` (`studentID`,`studentUsername`,`Password`)
	       VALUES('$enrolled','$username','$password')";
    $results=$conn->prepare($sql);
	$results->execute();
	echo $username.' '.$password;
	
}

?>
<!doctype html>
<html>
<head>
</head>
<body>
<table style="border: solid black 2px;">
<thead>New Students</thead>
<tr style="border: solid black 3px;">
<td>Name</td>
<td>Email</td>
<td>Action</td>
</tr>
<?php

$query="SELECT * FROM `students` WHERE `enroled`='N' ";
$rs=$conn->prepare($query);
$rs->execute();
$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
foreach($row as $data){
$id=$data['studentID'];
$name= $data['firstName'].' '.$data['familyName'];
$email=$data['emailAddress'];
echo'
<tbody>
<tr style="border: solid black 3px;">
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>
<form method="post" action="main.php">
<input type="checkbox" value="'.$id.'" name="id">
</td>
</tr>
</tbody>';
}?>
</table>
<tfoot><input type="submit" name="approve" value="Approve"></form></tfoot>
</body>
</html>


