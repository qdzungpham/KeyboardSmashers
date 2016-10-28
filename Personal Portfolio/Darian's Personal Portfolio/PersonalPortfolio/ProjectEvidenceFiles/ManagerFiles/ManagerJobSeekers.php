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
			<form method="post" action="SQLJobSeekers.php">
				Job Seeker ID: <input type="number" name="seekerID"><br><br>
				Job ID: <input type="number" name="jobID"><br><br>
				First Name: <input type="text" name="firstName"><br><br>
				Last Name: <input type="text" name="lastName"><br><br>
				Email Address: <input type="text" name="emailAddress"><br><br>
				Phone Number: <input type="text" name="phoneNumber"><br><br>
				Street: <input type="text" name="street"><br><br>
				Suburb: <input type="text" name="suburb"><br><br>
				State: <input type="text" name="state"><br><br>
				Postcode: <input type="number" name="postcode"><br><br>
				CV File Path: <input type="text" name="cvPath"><br><br>
				Accepted: <input type="text" name="accepted"><br><br>
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
			$seekerID=test_input($_POST['selectBox']);
			
			$query="SELECT * FROM `jobseekers` WHERE `seekerID` = ".$seekerID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$seekerID=$data['seekerID'];
				$jobID=$data['jobID'];
				$firstName=$data['firstName'];
				$lastName=$data['lastName'];
				$emailAddress=$data['emailAddress'];
				$phoneNumber=$data['phoneNumber'];
				$street=$data['street'];
				$suburb=$data['suburb'];
				$state=$data['state'];
				$postcode=$data['postcode'];
				$cvPath=$data['cvPath'];
				$accepted=$data['accepted'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLJobSeekers.php">
					Job Seeker ID: <input type="number" name="seekerID" value="'.$seekerID.'"><br><br>
					Job ID: <input type="number" name="jobID" value="'.$jobID.'"><br><br>
					First Name: <input type="text" name="firstName" value="'.$firstName.'"><br><br>
					Last Name: <input type="text" name="lastName" value="'.$lastName.'"><br><br>
					Email Address: <input type="text" name="emailAddress" value="'.$emailAddress.'"><br><br>
					Phone Number: <input type="text" name="phoneNumber" value="'.$phoneNumber.'"><br><br>
					Street: <input type="text" name="street" value="'.$street.'"><br><br>
					Suburb: <input type="text" name="suburb" value="'.$suburb.'"><br><br>
					State: <input type="text" name="state" value="'.$state.'"><br><br>
					Postcode: <input type="number" name="postcode" value="'.$postcode.'"><br><br>
					CV File Path: <input type="text" name="cvPath" value="'.$cvPath.'"><br><br>
					Accepted: <input type="text" name="accepted" value="'.$accepted.'"><br><br>
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
			$seekerID=test_input($_POST['selectBox']);
			$query="DELETE FROM `jobseekers` WHERE `seekerID`='$seekerID'";
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
