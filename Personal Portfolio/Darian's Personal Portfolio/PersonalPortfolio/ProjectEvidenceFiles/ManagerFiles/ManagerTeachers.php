<?php
// This code has the add, edit and delete functions for the teacher table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Pre-define an error message
	$selectionError = "Please tick a checkbox";
	
	// Add a new record
	// If add record was clicked, create a HTML web form with all the database table fields as separate inputs
	// Then add the record when 'create record' is clicked.
	if (isset($_POST['addRecord'])){
		// Create the web form
		echo '
			<form method="post" action="SQLTeachers.php">
				Teacher ID: <input type="number" name="teacherID"><br><br>
				First Name: <input type="text" name="firstName"><br><br>
				Last Name: <input type="text" name="familyName"><br><br>
				Gender: <input type="text" name="gender"><br><br>
				DOB: <input type="date" name="DOB"><br><br>
				Street: <input type="text" name="street"><br><br>
				Suburb: <input type="text" name="suburb"><br><br>
				State: <input type="text" name="state"><br><br>
				Postcode: <input type="number" name="postcode"><br><br>
				Qualifications: <input type="text" name="qualifications"><br><br>
				Email Address: <input type="text" name="emailAddress"><br><br>
				Mobile Number: <input type="text" name="mobileNumber"><br><br>
				Other Phone Number: <input type="text" name="otherNumber"><br><br>
				Instrument Taught: <input type="text" name="instrumentType"><br><br>
				Spoken Language/s: <input type="text" name="spokenLanguage"><br><br>
				Skill Level: <input type="text" name="skillLevel"><br><br>
				Comments and Feedback: <input type="text" name="comments"><br><br>
				<br>
				<input type="submit" name="createRecord" value="Create Record">
			</form>
		';
	}
	
	// Update an existing record
	// If edit was clicked, create a HTML web form with all the database table fields as separate inputs
	// Then, the record will be updated when 'update record' is clicked.
	if (isset($_POST['editRecord'])){
		// Check if $_POST is not null and create an error message if it is
		if (empty($_POST['selectBox'])) {
			echo '<script>alert("'.$selectionError.'");</script>';
		} else {
			$teacherID = test_input($_POST['selectBox']);
		
			$query="SELECT * FROM `teachers` WHERE `teacherID` = ".$teacherID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$teacherID=$data['teacherID'];
				$firstName=$data['firstName'];
				$familyName=$data['familyName'];
				$gender=$data['gender'];
				$DOB=$data['DOB'];
				$street=$data['street'];
				$suburb=$data['suburb'];
				$state=$data['state'];
				$postCode=$data['postcode'];
				$qualifications=$data['qualifications'];
				$emailAddress=$data['emailAddress'];
				$mobileNumber=$data['mobileNumber'];
				$otherNumber=$data['otherNumber'];
				$instrumentType=$data['instrumentType'];
				$spokenLanguage=$data['spokenLanguage'];
				$skillLevel=$data['skillLevel'];
				$comments=$data['comments'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLTeachers.php">
					Teacher ID: <input type="number" name="teacherID" value="'.$teacherID.'"><br><br>
					First Name: <input type="text" name="firstName" value="'.$firstName.'"><br><br>
					Last Name: <input type="text" name="familyName" value="'.$familyName.'"><br><br>
					Gender: <input type="text" name="gender" value="'.$gender.'"><br><br>
					DOB: <input type="date" name="DOB" value="'.$DOB.'"><br><br>
					Street: <input type="text" name="street" value="'.$street.'"><br><br>
					Suburb: <input type="text" name="suburb" value="'.$suburb.'"><br><br>
					State: <input type="text" name="state" value="'.$state.'"><br><br>
					Postcode: <input type="number" name="postcode" value="'.$postCode.'"><br><br>
					Qualifications: <input type="text" name="qualifications" value="'.$qualifications.'"><br><br>
					Email Address: <input type="text" name="emailAddress" value="'.$emailAddress.'"><br><br>
					Mobile Number: <input type="text" name="mobileNumber" value="'.$mobileNumber.'"><br><br>
					Other Phone Number: <input type="text" name="otherNumber" value="'.$otherNumber.'"><br><br>
					Instrument Taught: <input type="text" name="instrumentType" value="'.$instrumentType.'"><br><br>
					Spoken Language/s: <input type="text" name="spokenLanguage" value="'.$spokenLanguage.'"><br><br>
					Skill Level: <input type="text" name="skillLevel" value="'.$skillLevel.'"><br><br>
					Comments and Feedback: <input type="text" name="comments" value="'.$comments.'"><br><br>
					<br>
					<input type="submit" name="updateRecord" value="Update Record">
				</form>
			';
		}
	}
	
	// If delete was clicked, delete the selected student's records from the database
	if (isset($_POST['deleteRecord'])){
		// Check $_POST is not null and create an error message if not
		if (empty($_POST['selectBox'])) {
			echo '<script>alert("'.$selectionError.'");</script>';
		} else {
			$teacherID=test_input($_POST['selectBox']);
			$query="DELETE FROM `teachers` WHERE `teacherID`='$teacherID'";
			$rs=$conn->prepare($query);
			$rs->execute();

			// Let the admin know that row was successfully deleted
			echo 'Row successfully deleted. Have a good day.';
		}
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
