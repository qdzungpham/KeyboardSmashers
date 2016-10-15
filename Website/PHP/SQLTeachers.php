<?php
// This code uses sql to insert or update the inputted values into the teachers table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$teacherID=test_input($_POST["teacherID"]);
	$firstName=test_input($_POST["firstName"]);
	$familyName=test_input($_POST["familyName"]);
	$gender=test_input($_POST["gender"]);
	$DOB=test_input($_POST["DOB"]);
	$street=test_input($_POST["street"]);
	$suburb=test_input($_POST["suburb"]);
	$state=test_input($_POST["state"]);
	$postCode=test_input($_POST["postcode"]);
	$qualifications=test_input($_POST["qualifications"]);
	$emailAddress=test_input($_POST["emailAddress"]);
	$mobileNumber=test_input($_POST["mobileNumber"]);
	$otherNumber=test_input($_POST["otherNumber"]);
	$instrumentType=test_input($_POST["instrumentType"]);
	$spokenLanguage=test_input($_POST["spokenLanguage"]);
	$skillLevel=test_input($_POST["skillLevel"]);
	$comments=test_input($_POST["comments"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
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
	if (isset($_POST["updateRecord"])){
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
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
