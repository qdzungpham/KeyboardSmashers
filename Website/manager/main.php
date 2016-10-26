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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pinelands Music School | Management</title>
  <link href="../css/mycss.css" rel="stylesheet" type="text/css" >
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../portal/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../portal/dist/css/AdminLTE.min.css">
  <!-- skins -->
  <link rel="stylesheet" href="../portal/dist/css/skins/_all-skins.min.css">
  	<link href="../css/managerCSS.css" rel="stylesheet" type="text/css" >
	<link rel="shortcut icon" type="image/x-icon" href="../image/logo.ico" />
  
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pinelands</b>MusicSchool</span>
    </a>
    
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
	  <!-- User menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../image/profile.png" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../image/profile.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["UserName"]; ?>
                  <small>School Manager</small>
                </p>
              </li>
              
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="../home.php?logout=true" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      
	  <!-- main menu -->
      <ul class="sidebar-menu">
        
        <li class="active">
          <a href="main.php">
            <i class="fa fa-dashboard"></i> <span>Management Home</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          
        
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color:white">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Management Home
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">


        <p><strong>WARNING:</strong> Please check only one checkbox at a time when editing or deleting rows.</p>
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
		
		echo'<form method="post" action="../PHP/ManagerNewStudents.php">';
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
	<table style="display:block;overflow-x:auto;">
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
			<th>Guardian's First Name</th>
			<th>Guardian's Last Name</th>
			<th>Email Address</th>
			<th>Emergency Phone Number</th>
			<th>Enrolled</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all students -->
		<?php
		$query="SELECT * FROM `students`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		echo'<form method="post" action="../PHP/ManagerStudents.php">';
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
			$guardianFirstName=$data['guardianFirstName'];
			$guardianLastName=$data['guardianLastName'];
			$guardianEmail=$data['guardianEmail'];
			$guardianPhoneNumber=$data['guardianPhoneNumber'];
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
					<td>'.$guardianFirstName.'</td>
					<td>'.$guardianLastName.'</td>
					<td>'.$guardianEmail.'</td>
					<td>'.$guardianPhoneNumber.'</td>
					<td>'.$enrolled.'</td>
					<td>
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
	<!--<table>
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
		
		Retrieve the database values of all student parents/guardians
		<?php
		//$query="SELECT * FROM `studentguardian`";
		//$rs=$conn->prepare($query);
		//$rs->execute();
		//$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		//echo'<form method="post" action="../PHP/ManagerGurdians.php">';
		//foreach($row as $data){
		//	$guardianID=$data['guardianID'];
		//	$studentID=$data['studentID'];
		//	$guardianFirstName=$data['guardianFirstName'];
		//	$guardianLastName=$data['guardianLastName'];
		//	$guardianEmail=$data['guardianEmail'];
		//	$guardianPhoneNumber=$data['guardianPhoneNumber'];

			
		/*	echo'
			<tbody>
				<tr>
					<td>'.$guardianID.'</td>
					<td>'.$studentID.'</td>
					<td>'.$guardianFirstName.'</td>
					<td>'.$guardianLastName.'</td>
					<td>'.$guardianEmail.'</td>
					<td>'.$guardianPhoneNumber.'</td>
					<td>
						<input type="checkbox" value="'.$guardianID.'" name="selectBox">
					</td>
				</tr>
			</tbody>';
		}*/?>
	</table>
	<br>
	<tfoot>
		<input type="submit" name="addRecord" value="Add Record">
		<input type="submit" name="editRecord" value="Edit Record">
		<input type="submit" name="deleteRecord" value="Delete Record">
		</form>
	</tfoot>
	<br><br><br> -->
	
	
	
	
	
	
<!-- Display a table of all teachers -->
	<table style="display:block;overflow-x:auto;">
		<thead><h2>All Teachers</h2></thead>
		<tr>
			<th>Teacher ID</th>
			<th>First Name</th>
			<th>Family Name</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Street</th>
			<th>Suburb</th>
			<th>State</th>
			<th>Post Code</th>
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
		
		echo'<form method="post" action="../PHP/ManagerTeachers.php">';
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

			
			echo'
			<tbody>
				<tr>
					<td>'.$teacherID.'</td>
					<td>'.$firstName.'</td>
					<td>'.$familyName.'</td>
					<td>'.$gender.'</td>
					<td>'.$DOB.'</td>
					<td>'.$street.'</td>
					<td>'.$suburb.'</td>
					<td>'.$state.'</td>
					<td>'.$postCode.'</td>
					<td>'.$qualifications.'</td>
					<td>'.$emailAddress.'</td>
					<td>'.$mobileNumber.'</td>
					<td>'.$otherNumber.'</td>
					<td>'.$instrumentType.'</td>
					<td>'.$spokenLanguage.'</td>
					<td>'.$skillLevel.'</td>
					<td>'.$comments.'</td>
					<td>
						<input type="checkbox" value="'.$teacherID.'" name="selectBox">
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
		
		echo'<form method="post" action="../PHP/ManagerContracts.php">';
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
						<input type="checkbox" value="'.$contractID.'" name="selectBox">
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
			<th>Type of Instrument</th>
			<th>Cost to Hire</th>
			<th>Cost to Hire per Lesson</th>
			<th>Size</th>
			<th>Brand</th>
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
		
		echo'<form method="post" action="../PHP/ManagerInstruments.php">';
		foreach($row as $data){
			$instrumentID=$data['instrumentID'];
			$instrumentType=$data['instrumentType'];
			$hireCost=$data['hireCost'];
			$hireCostLesson=$data['hireCostLesson'];
			$instrumentSize=$data['instrumentSize'];
			$brand=$data['brand'];
			$conditionQuality=$data['conditionQuality'];
			$Quantity=$data['Quantity'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$instrumentID.'</td>
					<td>'.$instrumentType.'</td>
					<td>'.$hireCost.'</td>
					<td>'.$hireCostLesson.'</td>
					<td>'.$instrumentSize.'</td>
					<td>'.$brand.'</td>
					<td>'.$conditionQuality.'</td>
					<td>'.$Quantity.'</td>
					<td>
						<input type="checkbox" value="'.$instrumentID.'" name="selectBox">
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
		
		echo'<form method="post" action="../PHP/ManagerInstrumentHire.php">';
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
						<input type="checkbox" value="'.$hireID.'" name="selectBox">
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
			<th>Class Name</th>
			<th>Class Code</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Class Day</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Room Number</th>
			<th>Class Capacity</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all classes -->
		<?php
		$query="SELECT * FROM `classes`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		echo'<form method="post" action="../PHP/ManagerClasses.php">';
		foreach($row as $data){
			$classID=$data['classID'];
			$teacherID=$data['teacherID'];
			$className=$data['className'];
			$classIdname=$data['classIdname'];
			$startDate=$data['startDate'];
			$endDate=$data['endDate'];
			$classDay=$data['classDay'];
			$startTime=$data['startTime'];
			$endTime=$data['endTime'];
			$roomNumber=$data['roomNumber'];
			$classCapacity=$data['classCapacity'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$classID.'</td>
					<td>'.$teacherID.'</td>
					<td>'.$className.'</td>
					<td>'.$classIdname.'</td>
					<td>'.$startDate.'</td>
					<td>'.$endDate.'</td>
					<td>'.$classDay.'</td>
					<td>'.$startTime.'</td>
					<td>'.$endTime.'</td>
					<td>'.$roomNumber.'</td>
					<td>'.$classCapacity.'</td>
					<td>
						<input type="checkbox" value="'.$classID.'" name="selectBox">
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
			<th>Row ID</th>
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
		
		echo'<form method="post" action="../PHP/ManagerStudentClasses.php">';
		foreach($row as $data){
			$ID=$data['ID'];
			$classID=$data['classID'];
			$studentID=$data['studentID'];

			echo'
			<tbody>
				<tr>
					<td>'.$ID.'</td>
					<td>'.$classID.'</td>
					<td>'.$studentID.'</td>
					<td>
						<input type="checkbox" value="'.$ID.'" name="selectBox">
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
	
	
	
	
<!-- Display a table of available jobs -->
	<table>
		<thead><h2>Available Jobs</h2></thead>
		<tr>
			<th>Job ID</th>
			<th>Role</th>
			<th>Description</th>
			<th>Date Posted</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all available jobs -->
		<?php
		$query="SELECT * FROM `availablejobs`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		echo'<form method="post" action="../PHP/ManagerAvailableJobs.php">';
		foreach($row as $data){
			$jobID=$data['jobID'];
			$role=$data['role'];
			$description=$data['description'];
			$postDate=$data['postDate'];

			echo'
			<tbody>
				<tr>
					<td>'.$jobID.'</td>
					<td>'.$role.'</td>
					<td>'.$description.'</td>
					<td>'.$postDate.'</td>
					<td>
						<input type="checkbox" value="'.$jobID.'" name="selectBox">
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
	

<!-- Display a table of all job seekers -->
	<table>
		<thead><h2>Job Seekers</h2></thead>
		<tr>
			<th>Seeker ID</th>
			<th>Job ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Phone Number</th>
			<th>Street</th>
			<th>Suburb</th>
			<th>State</th>
			<th>Post Code</th>
			<th>CV File Path</th>
			<th>Accepted</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all job seekers -->
		<?php
		$query="SELECT * FROM `jobseekers`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		echo'<form method="post" action="../PHP/ManagerJobSeekers.php">';
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
			
			echo'
			<tbody>
				<tr>
					<td>'.$seekerID.'</td>
					<td>'.$jobID.'</td>
					<td>'.$firstName.'</td>
					<td>'.$lastName.'</td>
					<td>'.$emailAddress.'</td>
					<td>'.$phoneNumber.'</td>
					<td>'.$street.'</td>
					<td>'.$suburb.'</td>
					<td>'.$state.'</td>
					<td>'.$postcode.'</td>
					<td><a target="_blank" href = "../'.$cvPath.'">'.$cvPath.'</a></td>
					<td>'.$accepted.'</td>
					<td>
						<input type="checkbox" value="'.$seekerID.'" name="selectBox">
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
	
	
	
<!-- Display a table of all public announcements -->
	<table>
		<thead><h2>Public Announcements</h2></thead>
		<tr>
			<th>Announcement ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all public announcements -->
		<?php
		$query="SELECT * FROM `publicannouncements`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		echo'<form method="post" action="../PHP/ManagerPublicAnnouncements.php">';
		foreach($row as $data){
			$announcementID=$data['announcementID'];
			$title=$data['title'];
			$content=$data['content'];

			
			echo'
			<tbody>
				<tr>
					<td>'.$announcementID.'</td>
					<td>'.$title.'</td>
					<td>'.$content.'</td>
					<td>
						<input type="checkbox" value="'.$announcementID.'" name="selectBox">
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
	
	
	
	
<!-- Display a table of all class announcements -->
	<table>
		<thead><h2>Class Announcements</h2></thead>
		<tr>
			<th>Announcement ID</th>
			<th>Class ID</th>
			<th>Title</th>
			<th>Content</th>
			<th>Select Row</th>
		</tr>
		
		<!-- Retrieve the database values of all class announcements -->
		<?php
		$query="SELECT * FROM `classannouncements`";
		$rs=$conn->prepare($query);
		$rs->execute();
		$row=$rs->FetchALL(PDO::FETCH_ASSOC); 
		
		echo'<form method="post" action="../PHP/ManagerClassAnnouncements.php">';
		foreach($row as $data){
			$announcementID=$data['announcementID'];
			$classID=$data['classID'];
			$title=$data['title'];
			$content=$data['content'];

			echo'
			<tbody>
				<tr>
					<td>'.$announcementID.'</td>
					<td>'.$classID.'</td>
					<td>'.$title.'</td>
					<td>'.$content.'</td>
					<td>
						<input type="checkbox" value="'.$announcementID.'" name="selectBox">
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
        
		  
		 

	  
	  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2016 KeyboardSmashers.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../portal/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../portal/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../portal/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../portal/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../portal/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../portal/dist/js/demo.js"></script>
</body>
</html>
