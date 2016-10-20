<?php
// This code uses sql to insert or update the inputted values into the job seeker table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$seekerID=test_input($_POST["seekerID"]);
	$jobID=test_input($_POST["jobID"]);
	$firstName=test_input($_POST["firstName"]);
	$lastName=test_input($_POST["lastName"]);
	$emailAddress=test_input($_POST["emailAddress"]);
	$phoneNumber=test_input($_POST["phoneNumber"]);
	$street=test_input($_POST["street"]);
	$suburb=test_input($_POST["suburb"]);
	$state=test_input($_POST["state"]);
	$postcode=test_input($_POST["postcode"]);
	$cvPath=test_input($_POST["cvPath"]);
	$accepted=test_input($_POST["accepted"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO jobseekers (jobID, firstName, lastName, emailAddress, phoneNumber, street, suburb, state, 
			postcode, cvPath, accepted)
			VALUES ('$jobID', '$firstName', '$lastName', 
			'$emailAddress', '$phoneNumber', '$street', '$suburb', '$state', '$postcode', 
			'$cvPath', '$accepted');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE jobseekers 
			SET jobID='$jobID', firstName='$firstName', lastName='$lastName', 
			emailAddress='$emailAddress', phoneNumber='$phoneNumber', street='$street', suburb='$suburb', state='$state', postcode='$postcode', 
			cvPath='$cvPath', accepted='$accepted'
			WHERE seekerID = ".$seekerID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
