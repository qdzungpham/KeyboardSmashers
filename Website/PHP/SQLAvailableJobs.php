<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$jobID=test_input($_POST["jobID"]);
	$role=test_input($_POST["role"]);
	$description=test_input($_POST["description"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO availablejobs (role, description)
			VALUES ('$role', '$description');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE availablejobs 
			SET role='$role', description='$description'
			WHERE jobID = ".$jobID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
