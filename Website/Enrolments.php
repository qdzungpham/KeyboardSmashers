
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
  
  <link rel="stylesheet" href="portal/plugins/iCheck/square/blue.css">

</head>

<body class="hold-transition skin-blue layout-top-nav">
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
              <ul style="width: 370px;"class="dropdown-menu">
                <div class="login-box">
  
                   <div class="login-box-body">
                       <p class="login-box-msg">Sign in to start your session</p>

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
         
              </ul>
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

<div class ="form-wrapper">
	<form method="post" action="studentEnrolment.php">
	<fieldset>
	<legend>All Students</legend>
		<strong>First name: </strong><br>
		<input type="text" name="firstName"> *
		<br><br>
		<strong>Last name: </strong><br>
		<input type="text" name="lastName"> *
		<br><br>
		<strong>DOB: </strong><br>
		<input type="date" name="dob"> *
		<br><br>
		<strong>Address</strong><br>
		<div class = "addressMenu">
			Street:
			<br><br>
			Suburb:
			<br><br>
			State:
			<br><br>
			Postcode:
			<br><br>
		</div>
		<div class = "addressInputs">
			<input type="text" name="street"> *
			<br><br>
			<input type="text" name="suburb"> *
			<br><br>
			<input type="text" name = "state"> *
			<br><br>
			<input type="number" name="postCode"> *
			<br><br>
		</div>
		<strong>Gender: </strong>*<br>
		<div class ="options">
		<input type="radio" name="gender" value="male"> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
		<input type="radio" name="gender" value="other"> Other<br>
		</div>
		<br>
		<strong>Preferred Phone Number:</strong><br>
		<input type="text" name="phoneNumber">
		<br><br>
		<strong>Email Address: </strong><br>
		<input type="text" name="email"> *
		<br><br>
	</fieldset>
	<br><br>
	<fieldset>
	<legend>Preferences</legend>
		<strong>Preferred Lesson Day:</strong><br>
		<select name = "preferredDay">
			<option value = "monday">Monday</option>
			<option value = "tuesday">Tuesday</option>
			<option value = "wednesday">Wednesday</option>
			<option value = "thursday">Thursday</option>
			<option value = "friday">Friday</option>
		</select>
		<br><br>
		<strong>Preferred Lesson Time:</strong><br>
		<input type="time" name="preferredTime">
		<br><br>
		<strong>Preferred Teacher:</strong><br>
		<input type="text" name="preferredTeacher">
		<br><br>
		<strong>Preferred Language Spoken by Teacher:</strong><br>
		<input type="text" name="preferredLanguage">
		<br><br>
		<strong>Preferred Teacher Gender:</strong><br>
		<div class = "options">
		<input type="radio" name="preferredGender" value="male"> Male<br>
		<input type="radio" name="preferredGender" value="female"> Female<br>
		</div>
		<br>
	</fieldset>
	<br><br>
	<fieldset>
	<legend>Under 18s</legend>
		<strong>Parent/Guardian First Name:</strong><br>
		<input type="text" name="guardianFirstName"> *
		<br><br>
		<strong>Parent/Guardian Last Name:</strong><br>
		<input type="text" name="guardianLastName"> *
		<br><br>
		<strong>Parent/Guardian Preferred Phone Number:</strong><br>
		<input type="text" name="phonenumber">
		<br><br>
		<strong>Parent/Guardian Email Address:</strong><br>
		<input type="text" name="email"> *
		<br><br>
	</fieldset>
		<br>
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">
	</form>
	
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
