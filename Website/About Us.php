<?php 
require "connect.inc";


$qurey="SELECT * FROM `teachers`";

$results = $conn->prepare($qurey);
$results -> execute();
$row = $results->FetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pinelands Music School</title>
  <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
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
			<li class="active"><a href="About us.php">About Us</a></li>
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
                <span class="hidden-md">Login</span>
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
              if ($_SESSION["Roll"]=="manager"){
                echo '<img src="image/profile.png" class="img-circle" alt="User Image">';
              }


              echo'<p>
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
                if ($_SESSION["Roll"]=="manager"){
                  echo '<a href="manager/main.php" class="btn btn-default btn-flat">manager Portal</a>';
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
                       <a href="settings/passwordchange.php">I forgot my password</a><br>
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
<div id ="content">
		<div id ="page-heading">
			<b>ABOUT US</b><br>
		</div>
		<div id ="cname">
			<img src="image/line.png">
			
		</div>
</div>
<!-- container for content -->
<div id ="wrapper" >
<!-- school History -->
	<div class= "red-heading">
		Pinelands Music School
	</div>
	<div class= "school-description">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel consectetur lorem. Fusce imperdiet interdum condimentum. Vivamus convallis, felis a placerat accumsan, eros nisi tempus ligula, vel iaculis lectus dolor quis lectus. Vivamus et pretium enim. Cras vel mauris et sapien dictum commodo. Nam efficitur tellus elit. Duis vel fermentum mauris. Pellentesque gravida felis vel nulla iaculis, sit amet sodales diam aliquam. Duis viverra ultrices convallis. Sed non pellentesque arcu, et efficitur nibh. 
	</div>
	<div class= "red-heading">
		Vision and Values
	</div>
	<div class= "school-description">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel consectetur lorem. Fusce imperdiet interdum condimentum. Vivamus convallis, felis a placerat accumsan, eros nisi tempus ligula, vel iaculis lectus dolor quis lectus. Vivamus et pretium enim. Cras vel mauris et sapien dictum commodo. Nam efficitur tellus elit. Duis vel fermentum mauris. Pellentesque gravida felis vel nulla iaculis, sit amet sodales diam aliquam. Duis viverra ultrices convallis. Sed non pellentesque arcu, et efficitur nibh. 
	</div>
	<div class= "red-heading">
		Innovate and Create
	</div>
	<div class= "school-description">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel consectetur lorem. Fusce imperdiet interdum condimentum. Vivamus convallis, felis a placerat accumsan, eros nisi tempus ligula, vel iaculis lectus dolor quis lectus. Vivamus et pretium enim. Cras vel mauris et sapien dictum commodo. Nam efficitur tellus elit. Duis vel fermentum mauris. Pellentesque gravida felis vel nulla iaculis, sit amet sodales diam aliquam. Duis viverra ultrices convallis. Sed non pellentesque arcu, et efficitur nibh. 
	</div>

	<div id ="cname">
		<img src="image/line.png">
	</div>
	<div id= "staff-heading">
	Our Staff
	</div>
	<!-- staff history -->
	
	<div class ="teacher" >
	<?php 
	foreach($row as $data)
	{
	echo'
			<div class = "teacherd">
				<div class ="timage" >
					<img src = "image/teachers/'.$data['firstName']." ".$data['familyName'].'.png">
				</div>
				
				<div class ="tname">
					<b>'.$data['firstName'].'&nbsp;'.$data['familyName'].'</b>
				</div>
				<div class ="instrument">
					'.$data['instrumentType'].'
				</div>
				<div class ="teacher-description">
					<b>Email:</b> <a href="mailto:'.$data['emailAddress'].'">'.$data['emailAddress'].'<br></a>
					<b>Work Number:</b> '.$data['otherNumber'].'<br><br>
					<b>Qualifications:</b> '.$data['qualifications'].'<br><br>
					<b>Languages:</b> '.$data['spokenLanguage'].'<br><br>
					<b>Comments:</b>'.$data['comments'].'<br>
				</div>
			</div>';
		}
		?>	
	
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
