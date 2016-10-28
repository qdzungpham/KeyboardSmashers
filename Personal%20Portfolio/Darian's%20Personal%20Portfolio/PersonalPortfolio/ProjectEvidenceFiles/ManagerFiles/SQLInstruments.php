<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$instrumentID=test_input($_POST["instrumentID"]);
	$instrumentType=test_input($_POST["instrumentType"]);
	$hireCost=test_input($_POST["hireCost"]);
	$hireCostLesson=test_input($_POST["hireCostLesson"]);
	$instrumentSize=test_input($_POST["instrumentSize"]);
	$brand=test_input($_POST["brand"]);
	$conditionQuality=test_input($_POST["conditionQuality"]);
	$Quantity=test_input($_POST["Quantity"]);
	
	// Check for erraneous input values
	if (empty($instrumentType)) {
		$errorMsg = $errorMsg."<br>INSTRUMENT TYPE field cannot be empty";
	}
	if (!empty($hireCost) && !is_numeric($hireCost)) {
		$errorMsg = $errorMsg."<br>COST TO HIRE field must be a number";
	}
	if (!empty($hireCostLesson) && !is_numeric($hireCostLesson)) {
		$errorMsg = $errorMsg."<br>COST TO HIRE FOR ONE LESSON field must be a number";
	}
	if (empty($conditionQuality)) {
		$errorMsg = $errorMsg."<br>CONDITION QUALITY field cannot be empty";
	}
	if (empty($Quantity)) {
		$errorMsg = $errorMsg."<br>QUANTITY field cannot be empty";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO instruments (instrumentType, hireCost, hireCostLesson, 
			instrumentSize, brand, conditionQuality, Quantity)
			VALUES ('$instrumentType', '$hireCost', '$hireCostLesson', 
			'$instrumentSize', '$brand', '$conditionQuality', '$Quantity');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE instruments 
			SET instrumentType='$instrumentType', hireCost='$hireCost', 
			hireCostLesson='$hireCostLesson', instrumentSize='$instrumentSize', 
			brand='$brand', conditionQuality='$conditionQuality', Quantity='$Quantity'
			WHERE instrumentID = ".$instrumentID.";";
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
	
	
	
	
