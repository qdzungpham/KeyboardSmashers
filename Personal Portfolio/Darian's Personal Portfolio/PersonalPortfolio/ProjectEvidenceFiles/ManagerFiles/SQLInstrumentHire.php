<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$hireID=test_input($_POST["hireID"]);
	$studentID=test_input($_POST["studentID"]);
	$instrumentID=test_input($_POST["instrumentID"]);
	$startDate=test_input($_POST["startDate"]);
	$endDate=test_input($_POST["endDate"]);
	
	// Check for erraneous input values
	if (empty($studentID)) {
		$errorMsg = $errorMsg."<br>STUDENT ID field cannot be empty";
	}
	if (!is_numeric($studentID)) {
		$errorMsg = $errorMsg."<br>STUDENT ID field must be a number";
	}
	if (empty($instrumentID)) {
		$errorMsg = $errorMsg."<br>INSTRUMENT ID field cannot be empty";
	}
	if (!is_numeric($instrumentID)) {
		$errorMsg = $errorMsg."<br>INSTRUMENT ID field must be a number";
	}
	if (empty($startDate)) {
		$errorMsg = $errorMsg."<br>HIRE DATE field cannot be empty";
	}
	if (empty($endDate)) {
		$errorMsg = $errorMsg."<br>RETURN DATE field cannot be empty";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO instrumenthire (studentID, instrumentID, startDate, endDate)
			VALUES ('$studentID', '$instrumentID', '$startDate', 
			'$endDate');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE instrumenthire 
			SET studentID='$studentID', instrumentID='$instrumentID', startDate='$startDate', 
			endDate='$endDate'
			WHERE hireID = ".$hireID.";";
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
	
	
	
	
