<?php
// This code uses sql to insert or update the inputted values into the teaching contract table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$contractID=test_input($_POST["contractID"]);
	$studentID=test_input($_POST["studentID"]);
	$teacherID=test_input($_POST["teacherID"]);
	$startDate=test_input($_POST["startDate"]);
	$endDate=test_input($_POST["endDate"]);
	$lessonType=test_input($_POST["lessonType"]);
	$lessonDuration=test_input($_POST["lessonDuration"]);
	$lessonCost=test_input($_POST["lessonCost"]);
	$lessonFrequency=test_input($_POST["lessonFrequency"]);
	
	// Check for erraneous input values
	if (empty($studentID)) {
		$errorMsg = $errorMsg."<br>STUDENT ID field cannot be empty";
	}
	if (!is_numeric($studentID)) {
		$errorMsg = $errorMsg."<br>STUDENT ID field must be a number";
	}
	if (empty($teacherID)) {
		$errorMsg = $errorMsg."<br>TEACHER ID field cannot be empty";
	}
	if (!is_numeric($teacherID)) {
		$errorMsg = $errorMsg."<br>TEACHER ID field must be a number";
	}
	if (empty($startDate)) {
		$errorMsg = $errorMsg."<br>START DATE field cannot be empty";
	}
	if (empty($endDate)) {
		$errorMsg = $errorMsg."<br>END DATE field cannot be empty";
	}
	if (strcmp($lessonDuration, "30") && strcmp($lessonDuration, "60") != 0) {
		$errorMsg = $errorMsg."<br>LESSON DURATION field must be 30 or 60";
	}
	if (empty($lessonCost)) {
		$errorMsg = $errorMsg."<br>LESSON COST field cannot be empty";
	}
	if (!is_numeric($lessonCost)) {
		$errorMsg = $errorMsg."<br>LESSON COST field must be a number";
	}
	if (empty($lessonFrequency) || $lessonFrequency > 3 || $lessonFrequency < 1) {
		$errorMsg = $errorMsg."<br>LESSON FREQUENCY field must be a whole number between 1 and 3";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO teachingcontract (studentID, teacherID, startDate, 
			endDate, lessonType, lessonDuration, lessonCost, lessonFrequency)
			VALUES ('$studentID', '$teacherID', '$startDate', '$endDate', 
			'$lessonType', '$lessonDuration', '$lessonCost', '$lessonFrequency');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE teachingcontract 
			SET studentID='$studentID', teacherID='$teacherID', startDate='$startDate', 
			endDate='$endDate', lessonType='$lessonType', lessonDuration='$lessonDuration', 
			lessonCost='$lessonCost', lessonFrequency='$lessonFrequency'
			WHERE contractID = ".$contractID.";";
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
	
	
	
	
