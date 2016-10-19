<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$guardianID=test_input($_POST["guardianID"]);
	$studentID=test_input($_POST["studentID"]);
	$guardianFirstName=test_input($_POST["guardianFirstName"]);
	$guardianLastName=test_input($_POST["guardianLastName"]);
	$guardianEmail=test_input($_POST["guardianEmail"]);
	$guardianPhoneNumber=test_input($_POST["guardianPhoneNumber"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO studentguardian (studentID, guardianFirstName, 
			guardianLastName, guardianEmail, guardianPhoneNumber)
			VALUES ('$studentID', '$guardianFirstName', '$guardianLastName', 
			'$guardianEmail', '$guardianPhoneNumber');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE studentguardian 
			SET studentID='$studentID', guardianFirstName='$guardianFirstName', 
			guardianLastName='$guardianLastName', guardianEmail='$guardianEmail', 
			guardianPhoneNumber='$guardianPhoneNumber'
			WHERE guardianID = ".$guardianID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
