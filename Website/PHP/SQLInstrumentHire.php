<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$hireID=test_input($_POST["hireID"]);
	$studentID=test_input($_POST["studentID"]);
	$instrumentID=test_input($_POST["instrumentID"]);
	$startDate=test_input($_POST["startDate"]);
	$endDate=test_input($_POST["endDate"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO instrumenthire (studentID, instrumentID, startDate, endDate)
			VALUES ('$studentID', '$instrumentID', '$startDate', 
			'$endDate');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE instrumenthire 
			SET studentID='$studentID', instrumentID='$instrumentID', startDate='$startDate', 
			endDate='$endDate'
			WHERE hireID = ".$hireID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
