<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$announcementID=test_input($_POST["announcementID"]);
	$classID=test_input($_POST["classID"]);
	$title=test_input($_POST["title"]);
	$content=test_input($_POST["content"]);
	
	// Check for erraneous input values
	if (empty($classID)) {
		$errorMsg = $errorMsg."<br>CLASS ID field cannot be empty";
	}
	if (!is_numeric($classID)) {
		$errorMsg = $errorMsg."<br>CLASS ID field must be a number";
	}
	if (empty($content)) {
		$errorMsg = $errorMsg."<br>CONTENT field cannot be empty";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO classannouncements (classID, title, content)
			VALUES ('$classID', '$title', '$content');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE classannouncements 
			SET classID='$classID', title='$title', content='$content'
			WHERE announcementID = ".$announcementID.";";
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
	
	
	
	
