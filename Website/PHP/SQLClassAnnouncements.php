<?php
// This code uses sql to insert or update the inputted values into the student table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$announcementID=test_input($_POST["announcementID"]);
	$classID=test_input($_POST["classID"]);
	$title=test_input($_POST["title"]);
	$content=test_input($_POST["content"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO classannouncements (classID, title, content)
			VALUES ('$classID', '$title', '$content');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE classannouncements 
			SET classID='$classID', title='$title', content='$content'
			WHERE announcementID = ".$announcementID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
