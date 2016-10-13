<?php
require '../connect.inc'; 
if (!isset($_SESSION["manager"]))
  {
    header('location:../home.php');
  } 
?>

<!DOCTYPE html>
<html>
<head>
	<link href="../css/managerCSS.css" rel="stylesheet" type="text/css" >
</head>

<body>
<!-- Display a table of the students who have applied but not enrolled in the school -->
	<table>
		<thead><h2>New Students</h2></thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Select</th>
		</tr>
		
		<!-- Retrieve the database values of students not enrolled -->
		<?php
		$query="SELECT * FROM `students` WHERE `enroled`='N' ";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$studentID=$data['studentID'];
			$name= $data['firstName'].' '.$data['familyName'];
			$email=$data['emailAddress'];
			echo'
			<tbody>
				<tr>
					<td>'.$name.'</td>
					<td>'.$email.'</td>
					<td>
						<form method="post" action="../PHP/ManagerNewStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="approve" value="Approve">
		<input type="submit" name="reject" value="Reject">
		</form>
	</tfoot>
	<br><br><br>
	
	
<!-- Display a table of all students -->
	<table>
		<thead><h2>All Students</h2></thead>
		<tr>
			<th>Student ID</th>
			<th>First Name</th>
			<th>Family Name</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Street</th>
			<th>Suburb</th>
			<th>State</th>
			<th>Post Code</th>
			<th>Email Address</th>
			<th>Mobile Number</th>
			<th>Preferred Class Day</th>
			<th>Preferred Class Time</th>
			<th>Preferred Teacher</th>
			<th>Preferred Language</th>
			<th>Preferred Teacher Gender</th>
			<th>Enrolled</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all students -->
		<?php
		$query="SELECT * FROM `students`";
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
			
			echo'
			<tbody>
				<tr>
					<td>'.$studentID.'</td>
					<td>'.$firstName.'</td>
					<td>'.$familyName.'</td>
					<td>'.$gender.'</td>
					<td>'.$DOB.'</td>
					<td>'.$street.'</td>
					<td>'.$suburb.'</td>
					<td>'.$state.'</td>
					<td>'.$postCode.'</td>
					<td>'.$emailAddress.'</td>
					<td>'.$mobileNumber.'</td>
					<td>'.$preferredDay.'</td>
					<td>'.$preferredTime.'</td>
					<td>'.$preferredTeacher.'</td>
					<td>'.$preferredLanguage.'</td>
					<td>'.$preferredGender.'</td>
					<td>'.$enrolled.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	
	
	
	
<!-- Display a table of all student parent/guardians -->
	<table>
		<thead><h2>Student's Parent/Guardian</h2></thead>
		<tr>
			<th>Parent/Guardian ID</th>
			<th>Student ID</th>
			<th>Guardian's First Name</th>
			<th>Guardian's Last Name</th>
			<th>Email Address</th>
			<th>Emergency Phone Number</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all student parents/guardians -->
		<?php
		$query="SELECT * FROM `studentguardian`";
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

			
			echo'
			<tbody>
				<tr>
					<td>'.$guardianID.'</td>
					<td>'.$studentID.'</td>
					<td>'.$guardianFirstName.'</td>
					<td>'.$guardianLastName.'</td>
					<td>'.$guardianEmail.'</td>
					<td>'.$guardianPhoneNumber.'</td>
					<td>
						<form method="post" action="../PHP/ManagerStudentGuardians.php">
						<input type="checkbox" value="'.$guardianID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	
	
	
	
	
<!-- Display a table of all teachers -->
	<table>
		<thead><h2>All Teachers</h2></thead>
		<tr>
			<th>Teacher ID</th>
			<th>First Name</th>
			<th>Family Name</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Qualifications</th>
			<th>Email Address</th>
			<th>Mobile Number</th>
			<th>Other Phone Number</th>
			<th>Instrument Taught</th>
			<th>Spoken Language/s</th>
			<th>Skill Level</th>
			<th>Comments</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all teachers -->
		<?php
		$query="SELECT * FROM `teachers`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$teacherID=$data['teacherID'];
			$firstName=$data['firstName'];
			$familyName=$data['familyName'];
			$gender=$data['gender'];
			$DOB=$data['DOB'];
			$qualifications=$data['qualifications'];
			$emailAddress=$data['emailAddress'];
			$mobileNumber=$data['mobileNumber'];
			$otherNumber=$data['otherNumber'];
			$instrumentType=$data['instrumentType'];
			$spokenLanguage=$data['spokenLanguage'];
			$skillLevel=$data['skillLevel'];
			$comments=$data['comments'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$teacherID.'</td>
					<td>'.$firstName.'</td>
					<td>'.$familyName.'</td>
					<td>'.$gender.'</td>
					<td>'.$DOB.'</td>
					<td>'.$qualifications.'</td>
					<td>'.$emailAddress.'</td>
					<td>'.$mobileNumber.'</td>
					<td>'.$otherNumber.'</td>
					<td>'.$instrumentType.'</td>
					<td>'.$spokenLanguage.'</td>
					<td>'.$skillLevel.'</td>
					<td>'.$comments.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	
	

<!-- Display a table of all teaching contracts -->
	<table>
		<thead><h2>Teacher-Student Teaching Contracts</h2></thead>
		<tr>
			<th>Contract ID</th>
			<th>Student ID</th>
			<th>Teacher ID</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Lesson Type</th>
			<th>Lesson Duration</th>
			<th>Lesson Cost</th>
			<th>Lesson Frequency</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all teaching contracts -->
		<?php
		$query="SELECT * FROM `teachingcontract`";
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

			
			echo'
			<tbody>
				<tr>
					<td>'.$contractID.'</td>
					<td>'.$studentID.'</td>
					<td>'.$teacherID.'</td>
					<td>'.$startDate.'</td>
					<td>'.$endDate.'</td>
					<td>'.$lessonType.'</td>
					<td>'.$lessonDuration.'</td>
					<td>'.$lessonCost.'</td>
					<td>'.$lessonFrequency.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	
	
	

<!-- Display a table of all instruments -->
	<table>
		<thead><h2>All Instruments</h2></thead>
		<tr>
			<th>Instrument ID</th>
			<th>Instrument Name</th>
			<th>Cost to Hire</th>
			<th>Cost to Hire per Lesson</th>
			<th>Instrument Condition</th>
			<th>Quantity at School</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all instruments -->
		<?php
		$query="SELECT * FROM `instruments`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$instrumentID=$data['instrumentID'];
			$instrumentType=$data['instrumentType'];
			$hireCost=$data['hireCost'];
			$hireCostLesson=$data['hireCostLesson'];
			$conditionQuality=$data['conditionQuality'];
			$Quantity=$data['Quantity'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$instrumentID.'</td>
					<td>'.$instrumentType.'</td>
					<td>'.$hireCost.'</td>
					<td>'.$hireCostLesson.'</td>
					<td>'.$conditionQuality.'</td>
					<td>'.$Quantity.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	
	
	
	
<!-- Display a table of all the instrument hire details -->
	<table>
		<thead><h2>Instrument Hires</h2></thead>
		<tr>
			<th>Hire ID</th>
			<th>Student ID</th>
			<th>Instrument ID</th>
			<th>Hire Date</th>
			<th>Return Date</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all instrument hires -->
		<?php
		$query="SELECT * FROM `instrumenthire`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$hireID=$data['hireID'];
			$studentID=$data['studentID'];
			$instrumentID=$data['instrumentID'];
			$startDate=$data['startDate'];
			$endDate=$data['endDate'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$hireID.'</td>
					<td>'.$studentID.'</td>
					<td>'.$instrumentID.'</td>
					<td>'.$startDate.'</td>
					<td>'.$endDate.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	
	
	

<!-- Display a table of all classes -->
	<table>
		<thead><h2>All Classes</h2></thead>
		<tr>
			<th>Class ID</th>
			<th>Teacher ID</th>
			<th>Class Day</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Room Number</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all classes -->
		<?php
		$query="SELECT * FROM `classes`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$classID=$data['classID'];
			$teacherID=$data['teacherID'];
			$classDay=$data['classDay'];
			$startTime=$data['startTime'];
			$endTime=$data['endTime'];
			$roomNumber=$data['roomNumber'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$classID.'</td>
					<td>'.$teacherID.'</td>
					<td>'.$classDay.'</td>
					<td>'.$startTime.'</td>
					<td>'.$endTime.'</td>
					<td>'.$roomNumber.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	
	

	
<!-- Display a table of all the classes each student goes to -->
	<table>
		<thead><h2>Classes Each Student Goes To</h2></thead>
		<tr>
			<th>Class ID</th>
			<th>Student ID</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all the classes each student goes to -->
		<?php
		$query="SELECT * FROM `studentclass`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		foreach($row as $data){
			$classID=$data['classID'];
			$studentID=$data['studentID'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$classID.'</td>
					<td>'.$studentID.'</td>
					<td>
						<form method="post" action="../PHP/ManagerAllStudents.php">
						<input type="checkbox" value="'.$studentID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br>
	


</body>
</html>


