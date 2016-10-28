<?php
// This code has the add, edit and delete functions for the teaching contracts table

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
			<form method="post" action="SQLContracts.php">
				Contract ID: <input type="number" name="contractID"><br><br>
				Student ID: <input type="number" name="studentID"><br><br>
				Teacher ID: <input type="number" name="teacherID"><br><br>
				Contract Start Date: <input type="date" name="startDate"><br><br>
				Contract End Date: <input type="date" name="endDate"><br><br>
				Type of Lesson: <input type="text" name="lessonType"><br><br>
				Lesson Duration: <input type="number" name="lessonDuration"><br><br>
				Lesson Cost: <input type="number" name="lessonCost"><br><br>
				Lesson Frequency: <input type="number" name="lessonFrequency"><br><br>
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
			$contractID=test_input($_POST['selectBox']);
			
			$query="SELECT * FROM `teachingcontract` WHERE `contractID` = ".$contractID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$contractID=$data['contractID'];
				$studentID=$data['studentID'];
				$teacherID=$data['teacherID'];
				$startDate=$data['startDate'];
				$endDate=$data['endDate'];
				$lessonType=$data['lessonType'];
				$lessonDuration=$data['lessonDuration'];
				$lessonCost=$data['lessonCost'];
				$lessonFrequency=$data['lessonFrequency'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLContracts.php">
					Contract ID: <input type="number" name="contractID" value="'.$contractID.'"><br><br>
					Student ID: <input type="number" name="studentID" value="'.$studentID.'"><br><br>
					Teacher ID: <input type="number" name="teacherID" value="'.$teacherID.'"><br><br>
					Contract Start Date: <input type="date" name="startDate" value="'.$startDate.'"><br><br>
					Contract End Date: <input type="date" name="endDate" value="'.$endDate.'"><br><br>
					Type of Lesson: <input type="text" name="lessonType" value="'.$lessonType.'"><br><br>
					Lesson Duration: <input type="number" name="lessonDuration" value="'.$lessonDuration.'"><br><br>
					Lesson Cost: <input type="number" name="lessonCost" value="'.$lessonCost.'"><br><br>
					Lesson Frequency: <input type="number" name="lessonFrequency" value="'.$lessonFrequency.'"><br><br>
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
			$contractID=test_input($_POST['selectBox']);
			$query="DELETE FROM `teachingcontract` WHERE `contractID`='$contractID'";
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
