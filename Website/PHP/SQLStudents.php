<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Initialise the error message
	$errorMsg = "";
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$studentID=test_input($_POST["studentID"]);
	$firstName=test_input($_POST["firstName"]);
	$familyName=test_input($_POST["familyName"]);
	$gender=strtolower(test_input($_POST["gender"]));
	$DOB=test_input($_POST["DOB"]);
	$street=test_input($_POST["street"]);
	$suburb=test_input($_POST["suburb"]);
	$state=strtolower(test_input($_POST["state"]));
	$postCode=test_input($_POST["postcode"]);
	$emailAddress=test_input($_POST["emailAddress"]);
	$mobileNumber=test_input($_POST["mobileNumber"]);
	$preferredDay=test_input($_POST["preferredDay"]);
	$preferredTime=test_input($_POST["preferredTime"]);
	$preferredTeacher=test_input($_POST["preferredTeacher"]);
	$preferredLanguage=test_input($_POST["preferredLanguage"]);
	$preferredGender=strtolower(test_input($_POST["preferredGender"]));
	$guardianFirstName=test_input($_POST["guardianFirstName"]);
	$guardianLastName=test_input($_POST["guardianLastName"]);
	$guardianEmail=test_input($_POST["guardianEmail"]);
	$guardianPhoneNumber=test_input($_POST["guardianPhoneNumber"]);
	$enrolled=strtolower(test_input($_POST["enroled"]));
	
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
	if (strcmp($gender, "male") && strcmp($gender, "female") && strcmp($gender, "other") != 0) {
		$errorMsg = $errorMsg."<br>GENDER field must be \"Male\", \"Female\", or \"Other\")";
	}
	if (empty($DOB)) {
		$errorMsg = $errorMsg."<br>DATE OF BIRTH field cannot be empty";
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
	if (empty($postCode)) {
		$errorMsg = $errorMsg."<br>POSTCODE field cannot be empty";
	}
	if ($postCode < 0 || $postCode > 9999) {
		$errorMsg = $errorMsg."<br>POSTCODE field must be a 4 digit number";
	}
	if (empty($emailAddress)) {
		$errorMsg = $errorMsg."<br>EMAIL ADDRESS field cannot be empty";
	}
	if (!empty($preferredGender) && (strcmp($preferredGender, "male") && strcmp($preferredGender, "female") && strcmp($preferredGender, "none") != 0)) {
		$errorMsg = $errorMsg."<br>PREFERRED TEACHER'S GENDER field must be \"Male\", \"Female\", or \"None\")";
	}
	if (!empty($guardianFirstName) && !preg_match("/^[a-zA-Z ]*$/",$guardianFirstName)) {
		$errorMsg = $errorMsg."<br>GUARDIAN'S FIRST NAME field must be only letters and whitespace";
	}
	if (!empty($guardianLastName) && !preg_match("/^[a-zA-Z ]*$/",$guardianLastName)) {
		$errorMsg = $errorMsg."<br>GUARDIAN'S LAST NAME field must be only letters and whitespace";
	}
	if (strcmp($enrolled, "y") && strcmp($enrolled, "n") != 0) {
		$errorMsg = $errorMsg."<br>ENROLLED field must be \"Y\" or \"N\"";
	}
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"]) && $errorMsg == ""){
		$query="INSERT INTO students (firstName, familyName, gender, DOB, street, suburb, state, 
			postcode, emailAddress, mobileNumber, preferredDay, preferredTime, preferredTeacher, 
			preferredLanguage, preferredGender, guardianFirstName, 
			guardianLastName, guardianEmail, guardianPhoneNumber, enroled)
			VALUES ('$firstName', '$familyName', '$gender', 
			'$DOB', '$street', '$suburb', '$state', '$postCode', 
			'$emailAddress', '$mobileNumber', '$preferredDay', '$preferredTime', 
			'$preferredTeacher', '$preferredLanguage', '$preferredGender', '$guardianFirstName', 
			'$guardianLastName', '$guardianEmail', '$guardianPhoneNumber', '$enrolled');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"]) && $errorMsg == ""){
		$query="UPDATE students 
			SET firstName='$firstName', familyName='$familyName', gender='$gender', 
			DOB='$DOB', street='$street', suburb='$suburb', state='$state', postcode='$postCode', 
			emailAddress='$emailAddress', mobileNumber='$mobileNumber', preferredDay='$preferredDay', 
			preferredTime='$preferredTime', preferredTeacher='$preferredTeacher', preferredLanguage='$preferredLanguage', 
			preferredGender='$preferredGender', guardianFirstName='$guardianFirstName', 
			guardianLastName='$guardianLastName', guardianEmail='$guardianEmail', 
			guardianPhoneNumber='$guardianPhoneNumber', enroled='$enrolled'
			WHERE studentID = ".$studentID.";";
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
	
	
	
	
