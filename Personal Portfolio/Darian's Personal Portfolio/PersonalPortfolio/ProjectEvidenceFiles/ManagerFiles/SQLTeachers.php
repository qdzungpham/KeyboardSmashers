<?php
// This code uses sql to insert or update the inputted values into the teachers table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$teacherID=test_input($_POST["teacherID"]);
	$firstName=test_input($_POST["firstName"]);
	$familyName=test_input($_POST["familyName"]);
	$gender=strtolower(test_input($_POST["gender"]));
	$DOB=test_input($_POST["DOB"]);
	$street=test_input($_POST["street"]);
	$suburb=test_input($_POST["suburb"]);
	$state=strtolower(test_input($_POST["state"]));
	$postCode=test_input($_POST["postcode"]);
	$qualifications=test_input($_POST["qualifications"]);
	$emailAddress=test_input($_POST["emailAddress"]);
	$mobileNumber=test_input($_POST["mobileNumber"]);
	$otherNumber=test_input($_POST["otherNumber"]);
	$instrumentType=test_input($_POST["instrumentType"]);
	$spokenLanguage=test_input($_POST["spokenLanguage"]);
	$skillLevel=test_input($_POST["skillLevel"]);
	$comments=test_input($_POST["comments"]);
	
	// Check for erraneous input values
	if (empty($firstName)) {
		$errorMsg = $errorMsg."<br>FIRST NAME field cannot be empty";
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
		$errorMsg = $errorMsg."<br>FIRST NAME field must be only letters and whitespace";
	}
	if (empty($familyName)) {
		$errorMsg = $errorMsg."<br>LAST NAME field cannot be empty";
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$familyName)) {
		$errorMsg = $errorMsg."<br>LAST NAME field must be only letters and whitespace";
	}
	if (strcmp($gender, "male") && strcmp($gender, "female") != 0) {
		$errorMsg = $errorMsg."<br>GENDER field must be \"Male\" or \"Female\")";
	}
	if (empty($DOB)) {
		$errorMsg = $errorMsg."<br>DATE OF BIRTH field cannot be empty";
	}
	if (!empty($state) && (strcmp($state, "qld") && strcmp($state, "nsw") && strcmp($state, "act") && strcmp($state, "vic") && strcmp($state, "tas") && strcmp($state, "sa") && strcmp($state, "wa") && strcmp($state, "nt") != 0)) {
		$errorMsg = $errorMsg."<br>STATE field must be a state (e.g. \"QLD\")";
	}
	if (!empty($postCode) && ($postCode < 0 || $postCode > 9999)) {
		$errorMsg = $errorMsg."<br>POSTCODE field must be a 4 digit number";
	}
	if (empty($emailAddress)) {
		$errorMsg = $errorMsg."<br>EMAIL ADDRESS field cannot be empty";
	}

	if (empty($instrumentType)) {
		$errorMsg = $errorMsg."<br>INSTRUMENT TAUGHT field cannot be empty";
	}
	if (empty($spokenLanguage)) {
		$errorMsg = $errorMsg."<br>SPOKEN LANGUAGE/S field cannot be empty";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO teachers (firstName, familyName, gender, DOB, 
			street, suburb, state, postcode, qualifications, emailAddress, 
			mobileNumber, otherNumber, instrumentType, spokenLanguage, 
			skillLevel, comments)
			VALUES ('$firstName', '$familyName', '$gender', '$DOB', '$street', 
			'$suburb', '$state', '$postCode', '$qualifications', '$emailAddress', 
			'$mobileNumber', '$otherNumber', '$instrumentType', '$spokenLanguage', 
			'$skillLevel', '$comments');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE teachers 
			SET firstName='$firstName', familyName='$familyName', gender='$gender', DOB='$DOB', 
			street='$street', suburb='$suburb', state='$state', postcode='$postCode', qualifications='$qualifications',
			emailAddress='$emailAddress', mobileNumber='$mobileNumber', otherNumber='$otherNumber', 
			instrumentType='$instrumentType', spokenLanguage='$spokenLanguage', skillLevel='$skillLevel', 
			comments='$comments'
			WHERE teacherID = ".$teacherID.";";
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
	
	
	
	
