<?php
// This code uses sql to insert or update the inputted values into the student table

	// I have no idea what this does
	require '../connect.inc';
	
	//I have no idea what this block of code does
	if (!isset($_SESSION["manager"])) {
		header('location:../home.php');
	}
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$studentID=test_input($_POST["studentID"]);
	$firstName=test_input($_POST["firstName"]);
	$familyName=test_input($_POST["familyName"]);
	$gender=test_input($_POST["gender"]);
	$DOB=test_input($_POST["DOB"]);
	$street=test_input($_POST["street"]);
	$suburb=test_input($_POST["suburb"]);
	$state=test_input($_POST["state"]);
	$postCode=test_input($_POST["postcode"]);
	$emailAddress=test_input($_POST["emailAddress"]);
	$mobileNumber=test_input($_POST["mobileNumber"]);
	$preferredDay=test_input($_POST["preferredDay"]);
	$preferredTime=test_input($_POST["preferredTime"]);
	$preferredTeacher=test_input($_POST["preferredTeacher"]);
	$preferredLanguage=test_input($_POST["preferredLanguage"]);
	$preferredGender=test_input($_POST["preferredGender"]);
	$enrolled=test_input($_POST["enroled"]);
	$guardianFirstName=test_input($_POST["guardianFirstName"]);
	$guardianLastName=test_input($_POST["guardianLastName"]);
	$guardianPhoneNumber=test_input($_POST["guardianPhonenumber"]);
	$guardianEmail=test_input($_POST["guardianEmail"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO students (firstName, familyName, gender, DOB, street, suburb, state, 
			postcode, emailAddress, mobileNumber, preferredDay, preferredTime, preferredTeacher, 
			preferredLanguage, preferredGender, enroled, guardianFirstName, guardianLastName, 
			guardianPhonenumber, guardianEmail)
			VALUES ('$firstName', '$familyName', '$gender', 
			'$DOB', '$street', '$suburb', '$state', '$postCode', 
			'$emailAddress', '$mobileNumber', '$preferredDay', '$preferredTime', 
			'$preferredTeacher', '$preferredLanguage', '$preferredGender', '$enrolled', 
			'$guardianFirstName', '$guardianLastName', '$guardianPhoneNumber', '$guardianEmail');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE students 
			SET firstName='$firstName', familyName='$familyName', gender='$gender', 
			DOB='$DOB', street='$street', suburb='$suburb', state='$state', postcode='$postCode', 
			emailAddress='$emailAddress', mobileNumber='$mobileNumber', preferredDay='$preferredDay', 
			preferredTime='$preferredTime', preferredTeacher='$preferredTeacher', preferredLanguage='$preferredLanguage', 
			preferredGender='$preferredGender', enroled='$enrolled', guardianFirstName='$guardianFirstName', 
			guardianLastName='$guardianLastName', guardianPhonenumber='$guardianPhoneNumber', guardianEmail='$guardianEmail'
			WHERE studentID = ".$studentID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
?>
	
	
	
	