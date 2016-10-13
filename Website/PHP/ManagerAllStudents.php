<?php
//	!!!!!!!!!!!!!!! PROBLEM: MUST HAVE ONLY CHECKED ONE CHECKBOX AT A TIME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// This code has the add, edit and delete functions for the student table

	// I have no idea what this does
	require '../connect.inc';
	
	//I have no idea what this block of code does
	if (!isset($_SESSION["manager"])) {
		header('location:../home.php');
	}
	
	// If add record was clicked, create a HTML web form with all the database table fields as separate inputs
	// Then add the record when 'create record' is clicked.
	if (isset($_POST['addRecord'])){
		// Create the web form
		echo '
			<form method="post" action="SQLAllStudents.php">
				Student ID: <input type="int" name="studentID"><br><br>
				First Name: <input type="text" name="firstName"><br><br>
				Last Name: <input type="text" name="familyName"><br><br>
				Gender: <input type="text" name="gender"><br><br>
				DOB: <input type="date" name="DOB"><br><br>
				Street: <input type="text" name="street"><br><br>
				Suburb: <input type="text" name="suburb"><br><br>
				State: <input type="text" name="state"><br><br>
				Postcode: <input type="int" name="postcode"><br><br>
				Email Address: <input type="text" name="emailAddress"><br><br>
				Mobile Number: <input type="text" name="mobileNumber"><br><br>
				Preferred Class Day: <input type="date" name="preferredDay"><br><br>
				Preferred Class Time: <input type="time" name="preferredTime"><br><br>
				Preferred Teacher: <input type="text" name="preferredTeacher"><br><br>
				Preferred Language: <input type="text" name="preferredLanguage"><br><br>
				Preferred Teacher\'s Gender: <input type="text" name="preferredGender"><br><br>
				Enrolled: <input type="text" name="enroled"><br><br>
				Parent/Guardian\'s First Name: <input type="text" name="guardianFirstName"><br><br>
				Parent/Guardian\'s Last Name: <input type="text" name="guardianLastName"><br><br>
				Parent/Guardian\'s Phone Number: <input type="text" name="guardianPhonenumber"><br><br>
				Parent/Guardian\'s Email Address: <input type="text" name="guardianEmail"><br><br>
				<br>
				<input type="submit" name="createRecord" value="Create Record">
			</form>
		';
	}
	
	// If edit was clicked, create a HTML web form with all the database table fields as separate inputs
	// Then, the record will be updated when 'update record' is clicked.
	if (isset($_POST['editRecord'])){
		$studentID=$_POST['selectBox'];
		
		$query="SELECT * FROM `students` WHERE `studentID` = ".$studentID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$studentID=$data['studentID'];
			$firstName=$data['firstName'];
			$familyName=$data['familyName'];
			$gender=$data['gender'];
			$DOB=$data['DOB'];
			$street=$data['street'];
			$suburb=$data['suburb'];
			$state=$data['state'];
			$postCode=$data['postcode'];
			$emailAddress=$data['emailAddress'];
			$mobileNumber=$data['mobileNumber'];
			$preferredDay=$data['preferredDay'];
			$preferredTime=$data['preferredTime'];
			$preferredTeacher=$data['preferredTeacher'];
			$preferredLanguage=$data['preferredLanguage'];
			$preferredGender=$data['preferredGender'];
			$enrolled=$data['enroled'];
			$guardianFirstName=$data['guardianFirstName'];
			$guardianLastName=$data['guardianLastName'];
			$guardianPhoneNumber=$data['guardianPhonenumber'];
			$guardianEmail=$data['guardianEmail'];
		}
		
		// Create the web form
		echo '
			<form method="post" action="SQLAllStudents.php">
				Student ID: <input type="text" name="studentID" value="'.$studentID.'"><br><br>
				First Name: <input type="text" name="firstName" value="'.$firstName.'"><br><br>
				Last Name: <input type="text" name="familyName" value="'.$familyName.'"><br><br>
				Gender: <input type="text" name="gender" value="'.$gender.'"><br><br>
				DOB: <input type="date" name="DOB" value="'.$DOB.'"><br><br>
				Street: <input type="text" name="street" value="'.$street.'"><br><br>
				Suburb: <input type="text" name="suburb" value="'.$suburb.'"><br><br>
				State: <input type="text" name="state" value="'.$state.'"><br><br>
				Postcode: <input type="int" name="postcode" value="'.$postCode.'"><br><br>
				Email Address: <input type="text" name="emailAddress" value="'.$emailAddress.'"><br><br>
				Mobile Number: <input type="text" name="mobileNumber" value="'.$mobileNumber.'"><br><br>
				Preferred Class Day: <input type="date" name="preferredDay" value="'.$preferredDay.'"><br><br>
				Preferred Class Time: <input type="time" name="preferredTime" value="'.$preferredTime.'"><br><br>
				Preferred Teacher: <input type="text" name="preferredTeacher" value="'.$preferredTeacher.'"><br><br>
				Preferred Language: <input type="text" name="preferredLanguage" value="'.$preferredLanguage.'"><br><br>
				Preferred Teacher\'s Gender: <input type="text" name="preferredGender" value="'.$preferredGender.'"><br><br>
				Enrolled: <input type="text" name="enroled" value="'.$enrolled.'"><br><br>
				Parent/Guardian\'s First Name: <input type="text" name="guardianFirstName" value="'.$guardianFirstName.'"><br><br>
				Parent/Guardian\'s Last Name: <input type="text" name="guardianLastName" value="'.$guardianLastName.'"><br><br>
				Parent/Guardian\'s Phone Number: <input type="text" name="guardianPhonenumber" value="'.$guardianPhoneNumber.'"><br><br>
				Parent/Guardian\'s Email Address: <input type="text" name="guardianEmail" value="'.$guardianEmail.'"><br><br>
				<br>
				<input type="submit" name="updateRecord" value="Update Record">
			</form>
		';
	}
	
	// If delete was clicked, delete the selected student's records from the database
	if (isset($_POST['deleteRecord'])){
		$studentID=$_POST['selectBox'];
		$query="DELETE FROM `students` WHERE `studentID`='$studentID'";
		$rs=$conn->prepare($query);
		$rs->execute();

		// Let the admin know that row was successfully deleted
		echo 'Row successfully deleted. Have a good day.';
	}
?>