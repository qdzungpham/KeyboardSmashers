<?php
// This code uses sql to insert or update the inputted values into the teaching contract table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
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
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO teachingcontract (studentID, teacherID, startDate, 
			endDate, lessonType, lessonDuration, lessonCost, lessonFrequency)
			VALUES ('$studentID', '$teacherID', '$startDate', '$endDate', 
			'$lessonType', '$lessonDuration', '$lessonCost', '$lessonFrequency');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE teachingcontract 
			SET studentID='$studentID', teacherID='$teacherID', startDate='$startDate', 
			endDate='$endDate', lessonType='$lessonType', lessonDuration='$lessonDuration', 
			lessonCost='$lessonCost', lessonFrequency='$lessonFrequency'
			WHERE contractID = ".$contractID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
