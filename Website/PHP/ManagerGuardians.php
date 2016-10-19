<?php
// This code has the add, edit and delete functions for the student table

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
			<form method="post" action="SQLGuardians.php">
				Parent/Guardian ID: <input type="number" name="guardianID"><br><br>
				Student ID: <input type="number" name="studentID"><br><br>
				Guardian\'s First Name: <input type="text" name="guardianFirstName"><br><br>
				Guardian\'s Last Name: <input type="text" name="guardianLastName"><br><br>
				Email Address: <input type="text" name="guardianEmail"><br><br>
				Emergency Phone Number: <input type="text" name="guardianPhoneNumber"><br><br>
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
			$guardianID=test_input($_POST['selectBox']);
			
			$query="SELECT * FROM `studentguardian` WHERE `guardianID` = ".$guardianID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$guardianID=$data['guardianID'];
				$studentID=$data['studentID'];
				$guardianFirstName=$data['guardianFirstName'];
				$guardianLastName=$data['guardianLastName'];
				$guardianEmail=$data['guardianEmail'];
				$guardianPhoneNumber=$data['guardianPhoneNumber'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLGuardians.php">
					Parent/Guardian ID: <input type="number" name="guardianID" value="'.$guardianID.'"><br><br>
					Student ID: <input type="number" name="studentID" value="'.$studentID.'"><br><br>
					Guardian\'s First Name: <input type="text" name="guardianFirstName" value="'.$guardianFirstName.'"><br><br>
					Guardian\'s Last Name: <input type="text" name="guardianLastName" value="'.$guardianLastName.'"><br><br>
					Email Address: <input type="text" name="guardianEmail" value="'.$guardianEmail.'"><br><br>
					Emergency Phone Number: <input type="text" name="guardianPhoneNumber" value="'.$guardianPhoneNumber.'"><br><br>
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
			$guardianID=test_input($_POST['selectBox']);
			$query="DELETE FROM `studentguardian` WHERE `guardianID`='$guardianID'";
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
