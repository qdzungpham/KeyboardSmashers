<?php 
require "connect.inc";
if(isset($_GET['id'])){
  $ID=$_GET['id'];
}

if(isset($_POST['submit']))
{

 $firstName=$_POST['firstName'] ;
 $lastName=$_POST['lastName'] ;
 $street=$_POST['street'];
 $suburb=$_POST['suburb'];
 $state=$_POST['state'];
 $postCode=$_POST['postCode'];
 $phoneNumber=$_POST['phoneNumber'];
 $email=$_POST['email'];
 $file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/CVs/";
 $file_path=$folder.$file;
 if(move_uploaded_file($file_loc,$file_path))
 {

  $sql="INSERT INTO `jobseekers`(`JobID`,`firstName`,`lastName`,`street`,`suburb`,`state`,
                    `postcode`,`phoneNumber`,`emailAddress`,`cvPath`,`accepted`) 
        VALUES('$ID','$firstName','$lastName','$street','$suburb','$state','$postCode',
               '$phoneNumber','$email','$file_path','Pending')";
  $rs= $conn->prepare($sql);
  $rs->execute();
  echo "<script>
          alert(' Upload Successful');
      </script>";
echo "<meta http-equiv='refresh' content='0'>";
}
}

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
              if ($_SESSION["Roll"]=="manager"){
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
<div id ="content">
    <div id ="page-heading">
      <b>JOB VACANCIES</b><br>
    </div>
    <div id ="cname">
      <img src="image/line.png">
    </div>
</div>

  <div id="wrapper">
<!-- container for each job -->
<div class ="left-bar">
<?php
      $des = file_get_contents('upload/jobs/job1.txt');
      echo $des;

    ?>
</div>


<div class = "right-bar">
<div class="box box-primary">
  <div class="box-header with-border" ">
        <h3 class="box-title">Upload Your CV </h3>
    </div>
  
  <form method="post" action="" enctype="multipart/form-data">
  <div class="box-body" style="width:100%;">
  <div class="col-md-10">
  <div class="form-group">
    <label>First name * </label>
    <input class="form-control" type="text" name="firstName" value=""> 
    <span class="error"> </span>
    
  </div>
  <div class="form-group">
    <label>Last name * </label>
    <input class="form-control" type="text" name="lastName" value=""> 
    <span class="error"></span>
    
  </div>
  

  <div class="form-group">
    <label>Address *</label><br>
  
    
      <input class="form-control" type="text" name="street" placeholder="Street" value="">
      <span class="error"> </span>
      <br>
      
      <input class="form-control" type="text" name="suburb" placeholder="Suburb" value=""> 
      <span class="error"> </span>
      <br>
      
      <select class="form-control" name = "state" placeholder="State" value=""> 
        <option value=""disabled selected>State</option>
        <option value="QLD">QLD</option>
        <option value="NSW">NSW</option>
        <option value="ACT">ACT</option>
        <option value="VIC">VIC</option>
        <option value="TAS">TAS</option>
        <option value="SA">SA</option>
        <option value="WA">WA</option>
        <option value="NT">NT</option>
      </select>
      <span class="error"></span>
      <br>
      
      <input class="form-control" type="number" name="postCode" placeholder="Post Code" value=""> 
      <span class="error"> </span>
      
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input class="form-control" type="text" name="phoneNumber" value="">
    
  </div>  
  <div class="form-group">
    <label>Email Address * </label>
    <input class="form-control" type="text" name="email" value=""> 
    <span class="error"> </span>
  </div>
  <div class="form-group">
    <label>Upload CV * </label>
    <input class="form-control" type="file" name="file"> 
    <span class="error"> </span>
  </div>
  </div>
  
  </div>
  <div class="box-footer" >
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    <input type="reset" class="btn btn-default" name ="reset" value="Reset">
      </div>
  </form>
</div>
</div>
  </div>
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
</body>
</html>
