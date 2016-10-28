<?php
// This code uses sql to insert or update the inputted values into the classes table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$classID=test_input($_POST["classID"]);
	$teacherID=test_input($_POST["teacherID"]);
	$className=test_input($_POST["className"]);
	$classIdname=test_input($_POST["classIdname"]);
	$startDate=test_input($_POST["startDate"]);
	$endDate=test_input($_POST["endDate"]);
	$classDay=strtolower(test_input($_POST["classDay"]));
	$startTime=test_input($_POST["startTime"]);
	$endTime=test_input($_POST["endTime"]);
	$roomNumber=test_input($_POST["roomNumber"]);
	$classCapacity=test_input($_POST["classCapacity"]);
	
	// Check for erraneous input values
	if (empty($teacherID)) {
		$errorMsg = $errorMsg."<br>TEACHER ID field cannot be empty";
	}
	if (!is_numeric($teacherID)) {
		$errorMsg = $errorMsg."<br>TEACHER ID field must be a number";
	}
	if (empty($className)) {
		$errorMsg = $errorMsg."<br>CLASS NAME field cannot be empty";
	}
	if (empty($classIdname)) {
		$errorMsg = $errorMsg."<br>CLASS CODE field cannot be empty";
	}
	if (strlen($classIdname) > 6) {
		$errorMsg = $errorMsg."<br>CLASS CODE field must be 6 characters or less";
	}
	if (empty($startDate)) {
		$errorMsg = $errorMsg."<br>START DATE field cannot be empty";
	}
	if (empty($endDate)) {
		$errorMsg = $errorMsg."<br>END DATE field cannot be empty";
	}
	if (strcmp($classDay, "monday") && strcmp($classDay, "tuesday") && strcmp($classDay, "wednesday") && strcmp($classDay, "thursday") && strcmp($classDay, "friday") != 0) {
		$errorMsg = $errorMsg."<br>CLASS DAY field must be a weekday (e.g. \"Monday\")";
	}
	if (empty($startTime)) {
		$errorMsg = $errorMsg."<br>START TIME field cannot be empty";
	}
	if (empty($endTime)) {
		$errorMsg = $errorMsg."<br>END TIME field cannot be empty";
	}
	if (!empty($roomNumber) && strlen($roomNumber) != 4) {
		$errorMsg = $errorMsg."<br>ROOM NUMBER field must be 4 characters long";
	}
	if (empty($classCapacity)) {
		$errorMsg = $errorMsg."<br>CLASS CAPACITY field cannot be empty";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO classes (teacherID, className, classIdname, startDate, 
			endDate, classDay, startTime, endTime, roomNumber, classCapacity)
			VALUES ('$teacherID', '$className', '$classIdname', '$startDate', 
			'$endDate', '$classDay', '$startTime', '$endTime', '$roomNumber', 
			'$classCapacity');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE classes 
			SET teacherID='$teacherID', className='$className', classIdname='$classIdname', 
			startDate='$startDate', endDate='$endDate', classDay='$classDay', startTime='$startTime', 
			endTime='$endTime', roomNumber='$roomNumber', classCapacity='$classCapacity'
			WHERE classID = ".$classID.";";
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
	
	
	
	
