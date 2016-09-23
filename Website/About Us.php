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
                <span class="hidden-xs">Login</span>
              </a>
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
			About Us<br>
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
		<div class = "teacherd">
			<div class ="timage">
				<img src = "image/luna.png">
			</div>
			<div class ="tname">
				<b>Luna Naind</b>
			</div>
			<div class ="instrument">
				Guitar
			</div>
			<div class ="teacher-description">
				<b>Email:</b> super.anonymous@gmail.com<br>
				<b>Work Number:</b> 12345678<br><br>
				<b>Qualifications:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum tellus ut nulla faucibus feugiat. Etiam mollis faucibus volutpat.<br><br>
				<b>Languages:</b> Sed sagittis rhoncus lacus, sed.<br><br>
				<b>Hobbies:</b> Ut quis dolor tincidunt, cursus risus eu, mollis enim. Vestibulum accumsan odio vitae diam convallis elementum. Cras non euismod nulla. Nulla varius tristique ante, in dignissim libero imperdiet quis. Maecenas sit amet ex at nisl euismod aliquam. Vivamus at sem varius, pulvinar enim id, lobortis turpis.<br>
			</div>
		</div>
		<div class = "teacherd">
			<div class ="timage">
				<img src = "image/ahmen.png">
			</div>
			<div class ="tname">
				<b>Ahmed Saur</b>
			</div>
			<div class ="instrument">
				Guitar
			</div>
			<div class ="teacher-description">
				<b>Email:</b> super.anonymous@gmail.com<br>
				<b>Work Number:</b> 12345678<br><br>
				<b>Qualifications:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum tellus ut nulla faucibus feugiat. Etiam mollis faucibus volutpat.<br><br>
				<b>Languages:</b> Sed sagittis rhoncus lacus, sed.<br><br>
				<b>Hobbies:</b> Ut quis dolor tincidunt, cursus risus eu, mollis enim. Vestibulum accumsan odio vitae diam convallis elementum. Cras non euismod nulla. Nulla varius tristique ante, in dignissim libero imperdiet quis. Maecenas sit amet ex at nisl euismod aliquam. Vivamus at sem varius, pulvinar enim id, lobortis turpis.<br>
			</div>
		</div>
		<div class = "teacherd">
			<div class ="timage">
				<img src = "image/ena.png">
			</div>
			<div class ="tname">
				<b>Ena Leynovi</b>
			</div>
			<div class ="instrument">
				Guitar
			</div>
			<div class ="teacher-description">
				<b>Email:</b> super.anonymous@gmail.com<br>
				<b>Work Number:</b> 12345678<br><br>
				<b>Qualifications:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum tellus ut nulla faucibus feugiat. Etiam mollis faucibus volutpat.<br><br>
				<b>Languages:</b> Sed sagittis rhoncus lacus, sed.<br><br>
				<b>Hobbies:</b> Ut quis dolor tincidunt, cursus risus eu, mollis enim. Vestibulum accumsan odio vitae diam convallis elementum. Cras non euismod nulla. Nulla varius tristique ante, in dignissim libero imperdiet quis. Maecenas sit amet ex at nisl euismod aliquam. Vivamus at sem varius, pulvinar enim id, lobortis turpis.<br>
			</div>
		</div>
		<div class = "teacherd">
			<div class ="timage">
				<img src = "image/unknow.png">
			</div>
			<div class ="tname">
				<b>Anna Larend</b>
			</div>
			<div class ="instrument">
				Guitar
			</div>
			<div class ="teacher-description">
				<b>Email:</b> super.anonymous@gmail.com<br>
				<b>Work Number:</b> 12345678<br><br>
				<b>Qualifications:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum tellus ut nulla faucibus feugiat. Etiam mollis faucibus volutpat.<br><br>
				<b>Languages:</b> Sed sagittis rhoncus lacus, sed.<br><br>
				<b>Hobbies:</b> Ut quis dolor tincidunt, cursus risus eu, mollis enim. Vestibulum accumsan odio vitae diam convallis elementum. Cras non euismod nulla. Nulla varius tristique ante, in dignissim libero imperdiet quis. Maecenas sit amet ex at nisl euismod aliquam. Vivamus at sem varius, pulvinar enim id, lobortis turpis.<br>
			</div>
		</div>
		<div class = "teacherd">
			<div class ="timage">
				<img src = "image/kelvin.png">
			</div>
			<div class ="tname">
				<b>Kelvin Simons</b>
			</div>
			<div class ="instrument">
				Guitar
			</div>
			<div class ="teacher-description">
				<b>Email:</b> super.anonymous@gmail.com<br>
				<b>Work Number:</b> 12345678<br><br>
				<b>Qualifications:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum tellus ut nulla faucibus feugiat. Etiam mollis faucibus volutpat.<br><br>
				<b>Languages:</b> Sed sagittis rhoncus lacus, sed.<br><br>
				<b>Hobbies:</b> Ut quis dolor tincidunt, cursus risus eu, mollis enim. Vestibulum accumsan odio vitae diam convallis elementum. Cras non euismod nulla. Nulla varius tristique ante, in dignissim libero imperdiet quis. Maecenas sit amet ex at nisl euismod aliquam. Vivamus at sem varius, pulvinar enim id, lobortis turpis.<br>
			</div>
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
