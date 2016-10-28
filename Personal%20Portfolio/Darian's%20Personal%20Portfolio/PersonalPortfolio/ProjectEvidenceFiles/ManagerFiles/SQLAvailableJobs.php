<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$jobID=test_input($_POST["jobID"]);
	$role=test_input($_POST["role"]);
	$description=test_input($_POST["description"]);
	$postDate=test_input($_POST["postDate"]);
	
	// Check for erraneous input values
	if (empty($postDate)) {
		$errorMsg = $errorMsg."<br>DATE POSTED field cannot be empty";
	}
	
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO availablejobs (role, description, postDate)
			VALUES ('$role', '$description', '$postDate');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE availablejobs 
			SET role='$role', description='$description', postDate='$postDate'
			WHERE jobID = ".$jobID.";";
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
	
	
	
	
