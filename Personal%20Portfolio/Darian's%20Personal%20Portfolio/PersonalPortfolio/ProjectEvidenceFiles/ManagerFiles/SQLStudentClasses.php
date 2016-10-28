<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$ID=test_input($_POST["ID"]);
	$classID=test_input($_POST["classID"]);
	$studentID=test_input($_POST["studentID"]);
	
	// Check for erraneous input values
	if (empty($studentID)) {
		$errorMsg = $errorMsg."<br>STUDENT ID field cannot be empty";
	}
	if (!is_numeric($studentID)) {
		$errorMsg = $errorMsg."<br>STUDENT ID field must be a number";
	}
	if (empty($classID)) {
		$errorMsg = $errorMsg."<br>CLASS ID field cannot be empty";
	}
	if (!is_numeric($classID)) {
		$errorMsg = $errorMsg."<br>CLASS ID field must be a number";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO studentclass (classID, studentID)
			VALUES ('$classID', '$studentID');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE studentclass 
			SET classID='$classID', studentID='$studentID'
			WHERE ID = ".$ID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Display the error messages and let the user go back to the main manager page
	echo '
		'. $errorMsg .'
		<br><br>
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
