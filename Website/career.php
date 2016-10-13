<?php 
require "connect.inc";

?><!DOCTYPE html>
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
            <li><a href="Enrolments.php">Enrolment</a></li>
			<li><a href="About us.php">About Us</a></li>
			<li class="active"><a href="career.php">Careers</a></li>
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
              <li class="user-header">';
              if ($_SESSION["Roll"]=="teacher"){
                echo '<img src="image/teachers/'.$_SESSION['Name'].'.png " class="img-circle" alt="User Image">';
              }
              if ($_SESSION["Roll"]=="student"){
                echo '<img src="image/profile.png" class="img-circle" alt="User Image">';
              }


              echo'
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
  
  <div style="background:url('image/backk.png') no-repeat;background-size:100%;"class="content-wrapper">
    <div id ="wrap">
  		<div class ="slider_caption">
		<h2>Music Qualifications Delivered via e-learning / Distance Education </h2>
		<p style = "color:rgb(221,75,57)">IT'S AMAZING WHAT CAN HAPPEN WHEN YOU START FOR THE FUN OF IT</P>
		</div>
  </div>
   <div id = "content">
	<div id = "page-heading">
		<b>JOB VACANCIES</b>
	</div>
     <div id ="cname">
 			<img src="image/line.png">
 		 </div>
  </div>
  <div id="wrapper">
  <div id ="jobimage">
      <img src="image/job.png" alt="image" height="601px" width="1250px">
    
	
	<div class="entry-content clearfix">
<div align="center">
<table width="70%">
<style>


tr:nth-child(even){background-color: #f2f2f2}


</style>
<tbody>
<tr>
<td width="20%">Job Title</td>
<td width="80%">Piano teacher</td>
</tr>
<tr>
<td width="20%">Job Description</td>
<td width="80%">Pinelands music school is currently looking for Piano teachers with following requirements:<p></p>
<ul>
Bachelor Degree in Music Performance/ similar fields
Working experience 1-2 years
Able to play piano

Good communication skills with students
Able to work independently with high productivity
Have strong commitment and dedication in finishing job
Willing to learn and work hard
</ul>
<p>Please send over your CV and&nbsp;Portfolio to hello@pinelandmusicshool.com</p>
<p>&nbsp;</p></td>
</tr>
<tr>
<td width="20%">Company Name</td>
<td width="80%"><br>
Pinelandsmusicschool<br>
</a></td>
</tr>
<tr>
<td width="20%">Company Description</td>
<td width="80%">In the past couple of years, our ability to develop concept, design as well as insight and strategy has allowed us to work with wide range of clients, from corporate clients such as mining company, to consumer goods like food and beverage products.<p></p>
<p>Our passion and expertise is in corporate and consumer brand identity, such as logo company,<br>
stationery, company profile, product packaging, and other branded system of communication.<br>
We also have years of experience in creating concepts for print ads, billboard, poster, brochures,<br>
et cetera for advertisement purpose.</p>
<p>Specialties</p>
</td>
</tr>
<tr>
<td width="20%">Opening type</td>
<td width="80%">Fresh Graduates</td>
</tr>
<tr>
<td width="20%">City</td>
<td width="80%">Brisbane</td>
</tr>
<tr>
<td width="20%">Salary Range</td>
<td width="80%">$50000 ~ $60000</td>
</tr>
<tr>
<td width="20%">Application Deadline</td>
<td width="80%">1-12-2016</td>
</tr>
<tr>
<td width="20%">Send CV to:</td>
<td width="80%">hello@pinelandmusicshool.com</td>
</tr>
</table>

</div>
<a href="mailto:hr@pinelandsmusicschool.com"> <input class = "button" name="more" type="button" value="Apply Now"> </a>
</div>
	</div>
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
