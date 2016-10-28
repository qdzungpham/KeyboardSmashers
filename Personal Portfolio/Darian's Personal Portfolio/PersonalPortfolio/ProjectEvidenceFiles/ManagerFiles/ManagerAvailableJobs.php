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
			<form method="post" action="SQLAvailableJobs.php">
				Job ID: <input type="number" name="jobID"><br><br>
				Role: <input type="text" name="role"><br><br>
				Description: <input type="text" name="description"><br><br>
				Date Posted: <input type="date" name="postDate"><br><br>
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
			$jobID=test_input($_POST['selectBox']);
			
			$query="SELECT * FROM `availablejobs` WHERE `jobID` = ".$jobID.";";
			$rs=$conn->prepare($query);
			$rs->execute();
			$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
			
			foreach($row as $data){
				$jobID=$data['jobID'];
				$role=$data['role'];
				$description=$data['description'];
				$postDate=$data['postDate'];
			}
			
			// Create the web form
			echo '
				<form method="post" action="SQLAvailableJobs.php">
					Job ID: <input type="number" name="jobID" value="'.$jobID.'"><br><br>
					Role: <input type="text" name="role" value="'.$role.'"><br><br>
					Description: <input type="text" name="description" value="'.$description.'"><br><br>
					Date Posted: <input type="date" name="postDate" value="'.$postDate.'"><br><br>
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
			$jobID=test_input($_POST['selectBox']);
			$query="DELETE FROM `availablejobs` WHERE `jobID`='$jobID'";
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
