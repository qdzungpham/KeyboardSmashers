<?php
// This code accepts student enrolment applications if "approve" was clicked
// or rejects them - deleting them from the database if "reject" was clicked.

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Pre-define an error message
	$selectionError = "Please tick a checkbox";
	
	// If "Approve" was clicked, add a random username, password and enrolled='Y' to that student's records
	if (isset($_POST['approve'])){
		// Check if $_POST is not null and create an error message if it is
		if (empty($_POST['selectBox'])) {
			echo '<script>alert("'.$selectionError.'");</script>';
		} else {
			$studentID=test_input($_POST['selectBox']);
			$query="UPDATE `students` SET `enroled`='Y' WHERE `studentID`='$studentID'";
			$rs=$conn->prepare($query);
			$rs->execute();

			// Create a random username (that fits the constraints) and a random password using time as a seed
			// Then insert it into database
			$t=time();
			$time = $t.rand(0,9);
			$username = 'n'.substr($time,4,11);
			$password = uniqid();
			$hpassword = hash('sha256', $password);
			$sql= "INSERT INTO `studentlogin` (`studentID`,`studentUsername`,`Password`)
				   VALUES('$studentID','$username','$hpassword')";
			$results=$conn->prepare($sql);
			$results->execute();
			
			// Let the user know the username and password of the student
			echo 'Username: ' .$username.'<br>Password: '.$password.'<br>';
		}
	}
	
	// If "Reject" was clicked, delete that student's records from the database
	if (isset($_POST['reject'])){
		// Check if $_POST is not null and create an error message if it is
		if (empty($_POST['selectBox'])) {
			echo '<script>alert("'.$selectionError.'");</script>';
		} else {
			$studentID=test_input($_POST['selectBox']);
			$query="DELETE FROM `students` WHERE `studentID`='$studentID'";
			$rs=$conn->prepare($query);
			$rs->execute();

			// Let the admin know that row was successfully deleted
			echo 'Row successfully deleted. Have a good day.';
		}
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
