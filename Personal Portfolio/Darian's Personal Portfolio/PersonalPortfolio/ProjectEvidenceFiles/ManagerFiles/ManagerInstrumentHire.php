<?php
// This code has the add, edit and delete functions for the instrument hire table

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
			<form method="post" action="SQLInstrumentHire.php">
				Hire ID: <input type="number" name="hireID"><br><br>
				Student ID: <input type="number" name="studentID"><br><br>
				Instrument ID: <input type="number" name="instrumentID"><br><br>
				Hire Date: <input type="date" name="startDate"><br><br>
				Return Date: <input type="date" name="endDate"><br><br>
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
			$hireID=test_input($_POST['selectBox']);
			
			$query="SELECT * FROM `instrumenthire` WHERE `hireID` = ".$hireID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$hireID=$data['hireID'];
				$studentID=$data['studentID'];
				$instrumentID=$data['instrumentID'];
				$startDate=$data['startDate'];
				$endDate=$data['endDate'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLInstrumentHire.php">
					Hire ID: <input type="number" name="hireID" value="'.$hireID.'"><br><br>
					Student ID: <input type="number" name="studentID" value="'.$studentID.'"><br><br>
					Instrument ID: <input type="number" name="instrumentID" value="'.$instrumentID.'"><br><br>
					Hire Date: <input type="date" name="startDate" value="'.$startDate.'"><br><br>
					Return Date: <input type="date" name="endDate" value="'.$endDate.'"><br><br>
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
			$hireID=test_input($_POST['selectBox']);
			$query="DELETE FROM `instrumenthire` WHERE `hireID`='$hireID'";
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
