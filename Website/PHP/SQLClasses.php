<?php
// This code uses sql to insert or update the inputted values into the classes table

	// Make the connect.inc file available for use
	require '../connect.inc';
	
	// Regardless if this is an update or insertion, still need to make php variables of each field
	$classID=test_input($_POST["classID"]);
	$teacherID=test_input($_POST["teacherID"]);
	$className=test_input($_POST["className"]);
	$classIdname=test_input($_POST["classIdname"]);
	$startDate=test_input($_POST["startDate"]);
	$endDate=test_input($_POST["endDate"]);
	$classDay=test_input($_POST["classDay"]);
	$startTime=test_input($_POST["startTime"]);
	$endTime=test_input($_POST["endTime"]);
	$roomNumber=test_input($_POST["roomNumber"]);
	$classCapacity=test_input($_POST["classCapacity"]);
	
	// Create the sql to create a new record
	if (isset($_POST["createRecord"])){
		$query="INSERT INTO classes (teacherID, className, classIdname, startDate, 
			endDate, classDay, startTime, endTime, roomNumber, classCapacity)
			VALUES ('$teacherID', '$className', '$classIdname', '$startDate', 
			'$endDate', '$classDay', '$startTime', '$endTime', '$roomNumber', 
			'$classCapacity');";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully created record';
	}
	
	// Create the sql to update an old record
	if (isset($_POST["updateRecord"])){
		$query="UPDATE classes 
			SET teacherID='$teacherID', className='$className', classIdname='$classIdname', 
			startDate='$startDate', endDate='$endDate', classDay='$classDay', startTime='$startTime', 
			endTime='$endTime', roomNumber='$roomNumber', classCapacity='$classCapacity'
			WHERE classID = ".$classID.";";
		$rs=$conn->prepare($query);
		$rs->execute();
		
		echo 'Successfully updated record';
	}
	
	// Let the user go back to the main manager page
	echo '
		<p><a href="../manager/main.php">Back to Manager Page</a></p>
	';
?>
	
	
	
	
