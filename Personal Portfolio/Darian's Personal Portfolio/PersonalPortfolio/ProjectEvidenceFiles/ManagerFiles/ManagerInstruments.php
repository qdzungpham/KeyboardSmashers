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
			<form method="post" action="SQLInstruments.php">
				Instrument ID: <input type="number" name="instrumentID"><br><br>
				Instrument Type: <input type="text" name="instrumentType"><br><br>
				Cost to Hire: <input type="number" name="hireCost"><br><br>
				Cost to hire for one lesson: <input type="number" name="hireCostLesson"><br><br>
				Instrument Size: <input type="text" name="instrumentSize"><br><br>
				Brand: <input type="text" name="brand"><br><br>
				Condition Quality: <input type="text" name="conditionQuality"><br><br>
				Quantity: <input type="number" name="Quantity"><br><br>
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
			$instrumentID=test_input($_POST['selectBox']);
			
			$query="SELECT * FROM `instruments` WHERE `instrumentID` = ".$instrumentID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$instrumentID=$data['instrumentID'];
				$instrumentType=$data['instrumentType'];
				$hireCost=$data['hireCost'];
				$hireCostLesson=$data['hireCostLesson'];
				$instrumentSize=$data['instrumentSize'];
				$brand=$data['brand'];
				$conditionQuality=$data['conditionQuality'];
				$Quantity=$data['Quantity'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLInstruments.php">
					Instrument ID: <input type="number" name="instrumentID" value="'.$instrumentID.'"><br><br>
					Instrument Type: <input type="text" name="instrumentType" value="'.$instrumentType.'"><br><br>
					Cost to Hire: <input type="number" name="hireCost" value="'.$hireCost.'"><br><br>
					Cost to hire for one lesson: <input type="number" name="hireCostLesson" value="'.$hireCostLesson.'"><br><br>
					Instrument Size: <input type="text" name="instrumentSize" value="'.$instrumentSize.'"><br><br>
					Brand: <input type="text" name="brand" value="'.$brand.'"><br><br>
					Condition Quality: <input type="text" name="conditionQuality" value="'.$conditionQuality.'"><br><br>
					Quantity: <input type="number" name="Quantity" value="'.$Quantity.'"><br><br>
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
			$instrumentID=test_input($_POST['selectBox']);
			$query="DELETE FROM `instruments` WHERE `instrumentID`='$instrumentID'";
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
