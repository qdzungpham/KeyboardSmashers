
<?php 
require "connect.inc";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pinelands Music School</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link href="css/mycss.css" rel="stylesheet" type="text/css" >
  
  <link rel="stylesheet" href="portal/plugins/iCheck/square/blue.css">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="portal/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="portal/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="portal/dist/css/skins/_all-skins.min.css">
  <style type="text/css">.error{color:red;}</style>
  

</head>

<body class="hold-transition skin-blue layout-top-nav">


<!-- Create the php code to handle the enrolment form submission
// -----------------------------------CURRENTLY DOES NOT DO ANYTHING WITH THE FORM DETAILS EXCEPT STORE IN PHP VARIABLES AND CHECK IF EMPTY---------------------------------- -->
<?php
// Define web form results variables and error message variables and set to empty values
$firstName = $lastName = $dob = $street = $suburb = $state = 
$postCode = $gender = $phoneNumber = $email = $preferredTeacher = $preferredLanguage =
$preferredGender = $guardianFirstName = $preferredDay = $preferredTime =
$guardianLastName = $guardianPhonenumber = $guardianEmail = "";
$firstNameErr = $lastNameErr = $dobErr = $streetErr = $suburbErr = $stateErr = 
$postCodeErr = $genderErr = $emailErr = $Error="";
// Check to see each form value passes the requirements and store
// them in php variables.
// ---------CURRENTLY MISSES A LOT OF CHECKS--------------- NEEDS IMPROVEMENT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["firstName"])) {
		$firstNameErr = "First name is required";
	} else {
		$firstName = test_input($_POST["firstName"]);
	}
	
	if (empty($_POST["lastName"])) {
		$lastNameErr = "Last name is required";
	} else {
		$lastName = test_input($_POST["lastName"]);
	}
	
	if (empty($_POST["dob"])) {
		$dobErr = "Date of birth is required";
	} else {
		$dob = test_input($_POST["dob"]);
	}
	
	if (empty($_POST["street"])) {
		$streetErr = "Street is required";
	} else {
		$street = test_input($_POST["street"]);
	}
	
	if (empty($_POST["suburb"])) {
		$suburbErr = "Suburb is required";
	} else {
		$suburb = test_input($_POST["suburb"]);
	}
	
	if (empty($_POST["state"])) {
		$stateErr = "State is required";
	} else {
		$state = test_input($_POST["state"]);
	}
	
	
	if (empty($_POST["postCode"])) {
		$postCodeErr = "Postcode is required";
	} else {
		$postCode = test_input($_POST["postCode"]);
	}
	
	if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	} else {
		$gender = test_input($_POST["gender"]);
	}
	
	if (empty($_POST["phoneNumber"])) {
		$phoneNumber = "";
	} else {
		$phoneNumber = test_input($_POST["phoneNumber"]);
	}
	
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
	}
	$preferredDay = test_input($_POST["preferredDay"]);
	$preferredTime = test_input($_POST["preferredTime"]);
	$preferredTeacher = test_input($_POST["preferredTeacher"]);
	$preferredLanguage = test_input($_POST["preferredLanguage"]);
	if (empty($_POST["preferredGender"])) {
		$preferredGender = "";
	} else {
		$preferredGender = test_input($_POST["preferredGender"]);
	}
	
	

	// Guardian details need to be required if dob > 1998
	// Currently only optional
	$age=ageCalculator($dob);
	if ($age < 18){
		if (empty($_POST["guardianFirstName"])) {
			$Error = "Fileds Required";
		} else {
			$guardianFirstName = test_input($_POST["guardianFirstName"]);
		}
		
		if (empty($_POST["guardianLastName"])) {
			$Error = "Fileds Required";
		} else {
			$guardianLastName = test_input($_POST["guardianLastName"]);
		}
		
		if (empty($_POST["guardianPhonenumber"])) {
			$Error = "Fileds Required";
		} else {
			$guardianPhonenumber = test_input($_POST["guardianPhonenumber"]);
		}
		
		if (empty($_POST["guardianEmail"])) {
			$Error = "Fileds Required";
		} else {
			$guardianEmail = test_input($_POST["guardianEmail"]);
		}
	}
	else {
         $guardianFirstName = test_input($_POST["guardianFirstName"]);
         $guardianLastName = test_input($_POST["guardianLastName"]);
         $guardianPhonenumber = test_input($_POST["guardianPhonenumber"]);
		 $guardianEmail = test_input($_POST["guardianEmail"]);

	}	
}


if(isset($_POST['submit'])){
	if($firstNameErr == "" && $lastNameErr == "" &&$dobErr == "" &&
		$streetErr == ""&&		$suburbErr ==""&& $stateErr ==""&& 
		$postCodeErr == ""&& $genderErr == ""&& $emailErr == ""&& $Error==""){
		$query="INSERT INTO `students`(`firstName`,`familyName`,`gender`,`DOB`,`street`,`suburb`,`state`,
								   `postcode`,`emailAddress`,`mobileNumber`,`preferredDay`,`preferredTime`,`preferredTeacher`,
								    `preferredLanguage`,`preferredGender`,`guardianFirstName`,`guardianLastName`
								   ,`guardianPhonenumber`,`guardianEmail`,`enroled`)
			VALUES('$firstName','$lastName','$gender','$dob','$street','$suburb','$state','$postCode','$email',
				   '$phoneNumber','$preferredDay','$preferredTime','$preferredTeacher','$preferredLanguage',
				   '$preferredGender','$guardianFirstName','$guardianLastName','$guardianPhonenumber','$guardianEmail','N')";
	$rs=$conn->prepare($query);
	$rs->execute();
	$info="Your Requirements has been Uploaded, We Will Contact You Within 3 days, Please Check Your Email Regularlly";
	echo "<script type='text/javascript'>
				alert('$info');
			  </script>";
	$firstName = $lastName = $dob = $street = $suburb = $state = 
	$postCode = $gender = $phoneNumber = $email = $preferredTeacher = $preferredLanguage =
	$preferredGender = $guardianFirstName = $preferredDay = $preferredTime =
	$guardianLastName = $guardianPhonenumber = $guardianEmail = "";
	}
	else {
		$info ="Some of the fileds are required";
		echo "<script type='text/javascript'>
				alert('$info');
			  </script>";
	}

}

?>


<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="home.php" class="navbar-brand"><b>Pinelands</b>MusicSchool</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="Enrolments.php">Enrolment</a></li>
			<li><a href="About us.php">About Us</a></li>
			<li><a href="career.php">Careers</a></li>
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">Login</span>
              </a>
              <?php
              if (isset($_SESSION['UserID'])){
                echo '<ul width: 370px; class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="image/teachers/'.$_SESSION['Name'].'.png " class="img-circle" alt="User Image">

                <p>
                 '.$_SESSION["UserName"].'
                  <small>'.$_SESSION["Roll"].'</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">';
                if ($_SESSION["Roll"]=="teacher"){
                  echo '<a href="portal/teacherportal/index.php" class="btn btn-default btn-flat">Teacher Portal</a>';
                }
                if ($_SESSION["Roll"]=="student"){
                  echo '<a href="portal/index.php" class="btn btn-default btn-flat">Student Portal</a>';
                }
                echo '</div>
                <div class="pull-right">
                  <a href="home.php?logout=true" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>';
              }
              else echo'
              <ul style="width: 370px;"class="dropdown-menu">
                <div class="login-box">
  
                   <div class="login-box-body">
                       <p class="login-box-msg">Sign in to start your session</p>
                        <!-- login form -->
                       <form action="login.php" method="post">
                           <div class="form-group has-feedback">
                               <input type="text" class="form-control" placeholder="Username"
                               name="username" required>

                               <span class="glyphicon fa fa-user form-control-feedback"></span>
                           </div>
                           <div class="form-group has-feedback">
                               <input type="password" class="form-control" placeholder="Password"
                               name="password" required>
                               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                           </div>
                           <div class="row">
                               <div class="col-xs-8">
                                   <div class="checkbox icheck">
                                       <label>
                                           <input type="checkbox"> Remember Me
                                       </label>
                                   </div>
                               </div>
                               <!-- /.col -->
                               <div class="col-xs-4">
                                    <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
                                <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value ="Sign In">
                               </div>
                               <!-- /.col -->
                           </div>
                       </form>
                       <a href="#">I forgot my password</a><br>
                   </div>
                   <!-- /.login-box-body -->
                </div>
         
              </ul>';
              ?>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  
  <div style="background:url('image/back.gif') no-repeat;background-size:100%;"class="content-wrapper">
    <div id ="wrap">
		<div id="slider">
			<img src="image/image1.gif">
		</div>
</div>
<div id ="content">
		<div id ="page-heading">
			Enrolments<br>
		</div>
		<div id ="cname">
			<img src="image/line.png">
		</div>
</div>



<!-- Create the student enrolment web form -->
<!-- Post the data to self so the php near the start of this file can handle it -->
<div class ="form-wrapper">

<!-- Foreword -->
<p>The following form must be filled out by new students. Students can indicate 
their preferences, but this section of the form is optional. Students aged under 18 must
fill in their parent or guardian details on this form. Students aged 18 or over do not need
to complete this section of the form. Fields indicated by an asterix * are essential.</p><br><br>
	
	<!-- The error messages are not completely correct yet - need additional checks in the php code.
	For now, they simply show up if a required field is not filled out -->
	<div class="box box-primary">
	<div class="box-header with-border">
        <h3 class="box-title">Enrolment Form</h3>
    </div>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="box-body">
	<div class="col-md-6">
	<legend>All Students</legend>
	<div class="form-group">
		<label>First name * </label>
		<input class="form-control" type="text" name="firstName" value="<?php echo $firstName;?>"> 
		<span class="error"> <?php echo $firstNameErr;?></span>
		
	</div>
	<div class="form-group">
		<label>Last name * </label>
		<input class="form-control"type="text" name="lastName" value="<?php echo $lastName;?>"> 
		<span class="error"> <?php echo $lastNameErr;?></span>
		
	</div>
	
	<div class="form-group">
		<label>Date Of Birth * </label><br>
		<input class="form-control" type="date" name="dob" value="<?php echo $dob;?>">
		<span class="error"> <?php echo $dobErr;?></span>
		
	</div>	
		<!-- Create two divs - one to store the address titles on the left (which is right aligned),
		and the second div contains the input forms for the corresponding address title on the right of the first div
		(and which is left aligned). Having these two divs side by side is purely for formatting. -->
	<div class="form-group">
		<label>Address *</label><br>
	
		
			<input class="form-control"type="text" name="street" placeholder="Street" value="<?php echo $street;?>">
			<span class="error"> <?php echo $streetErr;?></span>
			<br>
			
			<input class="form-control"type="text" name="suburb" placeholder="Suburb" value="<?php echo $suburb;?>"> 
			<span class="error"> <?php echo $suburbErr;?></span>
			<br>
			
			<input class="form-control"type="text" name = "state" placeholder="State" value="<?php echo $state;?>"> 
			<span class="error"> <?php echo $stateErr;?></span>
			<br>
			
			<input class="form-control"type="number" name="postCode" placeholder="Post Code" value="<?php echo $postCode;?>"> 
			<span class="error"> <?php echo $postCodeErr;?></span>
			
		
	</div>
	
	<div class="form-group">
		<label>Gender * </label>
		<span class="error"> <?php echo $genderErr;?></span>
		<br>
		
		<input type="radio" name="gender" value="male"> Male
		<input type="radio" name="gender" value="female"> Female
	    
		<br>
	</div>	
	<div class="form-group">
		<label>Preferred Phone Number</label>
		<input class="form-control"type="text" name="phoneNumber" value="<?php echo $phoneNumber;?>">
		
	</div>	
	<div class="form-group">
		<label>Email Address </label>
		<input class="form-control"type="text" name="email" value="<?php echo $email;?>"> 
		<span class="error"> <?php echo $emailErr;?></span>
		
	</div>
	</div>
	
	
	<!-- Optional student preferences -->
	<fieldset class="col-md-6">
	<legend>Preferences</legend>
	<div class="form-group">
		<label>Preferred Lesson Day</label>
		<select class="form-control" name = "preferredDay">
		    <option Value = "title">Please Select</option>
			<option value = "monday">Monday</option>
			<option value = "tuesday">Tuesday</option>
			<option value = "wednesday">Wednesday</option>
			<option value = "thursday">Thursday</option>
			<option value = "friday">Friday</option>
		</select>
	</div>
	<div class="form-group">
		<label>Preferred Lesson Time</label>
		<input class="form-control"type="time" name="preferredTime" value="<?php echo $preferredTime;?>">
	</div>
    <div class="form-group">
		<label>Preferred Teacher:</label>
		<input class="form-control"type="text" name="preferredTeacher" value="<?php echo $preferredTeacher;?>">
    </div>
	<div class="form-group">
		<label>Preferred Language Spoken by Teacher</label>
		<input class="form-control"type="text" name="preferredLanguage" value="<?php echo $preferredLanguage;?>">
	</div>
	<div class="form-group">
		<label>Preferred Teacher Gender</label><br>
		<input type="radio" name="preferredGender" value="none"> No Preferences
		<input type="radio" name="preferredGender" value="male"> Male
		<input type="radio" name="preferredGender" value="female"> Female
	</div>
	</fieldset>
	
	
	<!-- Parent/Guardian information only required for under 18s -->
	<div class="col-md-6">
	<legend>Under 18s</legend>
	<span class="error"> <?php echo $Error;?></span>
	<div class="form-group">
		<label>Parent/Guardian First Name</label>
		<input class="form-control"type="text" name="guardianFirstName" value="<?php echo $guardianFirstName;?>"> 
    </div>
	<div class="form-group">
		<label>Parent/Guardian Last Name</label>
		<input class="form-control"type="text" name="guardianLastName" value="<?php echo $guardianLastName;?>"> 
    </div>
	<div class="form-group">
		<label>Parent/Guardian Preferred Phone Number</label>
		<input class="form-control"type="text" name="guardianPhonenumber" value="<?php echo $guardianPhonenumber;?>">
	</div>
	<div class="form-group">
		<label>Parent/Guardian Email Address</label>
		<input class="form-control"type="text" name="guardianEmail" value="<?php echo $guardianEmail;?>"> 
	</div>
	</div>
	</div>
	    <div class="box-footer" >
	    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
		<input type="reset" class="btn btn-default" name ="reset" value="Reset">
	    </div>
	    
	
	</form>
	
	
	
	</div>
	<br>
	<p>Any fields with an asterix * are essential</p>
</div>


  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      
      <strong>Copyright &copy; 2016 KeyboardSmashers.</strong> All rights
    reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="portal/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="portal/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="portal/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="portal/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="portal/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="portal/dist/js/demo.js"></script>
<script src="portal/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
