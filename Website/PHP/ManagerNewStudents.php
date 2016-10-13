<?php
//	!!!!!!!!!!!!!!! PROBLEM: CAN ONLY ACCEPT ONE CHECKBOX AT A TIME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// This code accepts student enrolment applications if "approve" was clicked
// or rejects them - deleting them from the database if "reject" was clicked.

	// I have no idea what this does
	require '../connect.inc';
	
	//I have no idea what this block of code does
	if (!isset($_SESSION["manager"])) {
		header('location:../home.php');
	}
	
	// If "Approve" was clicked, add a random username, password and enrolled='Y' to that student's records
	if (isset($_POST['approve'])){
		$studentID=$_POST['selectBox'];
		$query="UPDATE `students` SET `enroled`='Y' WHERE `studentID`='$studentID'";
		$rs=$conn->prepare($query);
		$rs->execute();

		// Create a random username (that fits the constraints) and a random password using time as a seed
		// Then insert it into database
		$t=time();
		$time = $t.rand(0,9);
		$username = 'n'.substr($time,4,11);
		$password = uniqid();
		$sql= "INSERT INTO `studentlogin` (`studentID`,`studentUsername`,`Password`)
			   VALUES('$studentID','$username','$password')";
		$results=$conn->prepare($sql);
		$results->execute();
		echo 'Username: ' .$username.'<br>Password: '.$password.'<br>';
	}
	
	// If "Reject" was clicked, delete that student's records from the database
	if (isset($_POST['reject'])){
		$studentID=$_POST['selectBox'];
		$query="DELETE FROM `students` WHERE `studentID`='$studentID'";
		$rs=$conn->prepare($query);
		$rs->execute();

		// Let the admin know that row was successfully deleted
		echo 'Row successfully deleted. Have a good day.';
	}
?>