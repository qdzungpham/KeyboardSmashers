<?php
// This code uses sql to insert or update the inputted values into the job seeker table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$seekerID=test_input($_POST["seekerID"]);
	$jobID=test_input($_POST["jobID"]);
	$firstName=test_input($_POST["firstName"]);
	$lastName=test_input($_POST["lastName"]);
	$emailAddress=test_input($_POST["emailAddress"]);
	$phoneNumber=test_input($_POST["phoneNumber"]);
	$street=test_input($_POST["street"]);
	$suburb=test_input($_POST["suburb"]);
	$state=strtolower(test_input($_POST["state"]));
	$postcode=test_input($_POST["postcode"]);
	$cvPath=test_input($_POST["cvPath"]);
	$accepted=strtolower(test_input($_POST["accepted"]));
	
	// Check for erraneous input values
	if (empty($jobID)) {
		$errorMsg = $errorMsg."<br>JOB ID field cannot be empty";
	}
	if (!is_numeric($jobID)) {
		$errorMsg = $errorMsg."<br>JOB ID field must be a number";
	}
	if (empty($firstName)) {
		$errorMsg = $errorMsg."<br>FIRST NAME field cannot be empty";
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
		$errorMsg = $errorMsg."<br>FIRST NAME field must be only letters and whitespace";
	}
	if (empty($lastName)) {
		$errorMsg = $errorMsg."<br>LAST NAME field cannot be empty";
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
		$errorMsg = $errorMsg."<br>LAST NAME field must be only letters and whitespace";
	}
	if (empty($emailAddress)) {
		$errorMsg = $errorMsg."<br>EMAIL ADDRESS field cannot be empty";
	}
	if (empty($street)) {
		$errorMsg = $errorMsg."<br>STREET field cannot be empty";
	}
	if (empty($suburb)) {
		$errorMsg = $errorMsg."<br>SUBURB field cannot be empty";
	}
	if (strcmp($state, "qld") && strcmp($state, "nsw") && strcmp($state, "act") && strcmp($state, "vic") && strcmp($state, "tas") && strcmp($state, "sa") && strcmp($state, "wa") && strcmp($state, "nt") != 0) {
		$errorMsg = $errorMsg."<br>STATE field must be a state (e.g. \"QLD\")";
	}
	if (empty($postcode)) {
		$errorMsg = $errorMsg."<br>POSTCODE field cannot be empty";
	}
	if ($postcode < 0 || $postcode > 9999) {
		$errorMsg = $errorMsg."<br>POSTCODE field must be a 4 digit number";
	}
	if (strcmp($accepted, "yes") && strcmp($accepted, "no") && strcmp($accepted, "pending") != 0) {
		$errorMsg = $errorMsg."<br>ACCEPTED field must be \"Yes\", \"No\", or \"Pending\"";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
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
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE jobseekers 
			SET jobID='$jobID', firstName='$firstName', lastName='$lastName', 
			emailAddress='$emailAddress', phoneNumber='$phoneNumber', street='$street', suburb='$suburb', state='$state', postcode='$postcode', 
			cvPath='$cvPath', accepted='$accepted'
			WHERE seekerID = ".$seekerID.";";
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
	
	
	
	
