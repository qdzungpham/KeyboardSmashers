
<?php
require "../connect.inc";
portal_ckeck();
$id=$_SESSION["UserID"];
$err='';
$sql = "SELECT * FROM `students` WHERE studentID = '$id'";
$rs = $conn->prepare($sql);
$rs -> execute();
$record = $rs->FetchALL(PDO::FETCH_ASSOC);
foreach($record as $data)
        {       
          $dob=$data['DOB'];
          $gender=$data['gender'];
          $phone=$data['mobileNumber'];
          $mail=$data['street'].' '.$data['suburb'].' '.$data['state'].' '.$data['postcode'];
          $address=$mail;
          $email=$data['emailAddress'];
        }

$query = "SELECT * FROM `studentlogin` WHERE studentID = '$id'";
$results = $conn->prepare($query);
$results -> execute();
$row = $results->FetchALL(PDO::FETCH_ASSOC);
foreach($row as $info)
        {       
          $password=$info['Password'];
        }
if(isset($_POST['Change'])){
  $username=$_POST['username'];
  $oldpassword=hash('sha256',$_POST['oldpassword']);
  $newpassword=hash('sha256',$_POST['newpassword']);
  if(!empty($_POST['newpassword']))
  {
  if ($username==$_SESSION['UserName'])
  {
       if ($oldpassword==$password)
       {
        $sql="UPDATE `studentlogin` SET `Password`='$newpassword'
              WHERE `studentID`='$id'";
        $rs = $conn->prepare($sql);
        $rs -> execute();
        echo "<script>
          alert(' Your password has benn changed');
          </script>";
        echo "<meta http-equiv='refresh' content='0'>";
        session_destroy();
        header('location:../home.php');

      }
      else
      {
         echo "<script>
         alert(' Invalide passwrod');
          </script>";
          echo "<meta http-equiv='refresh' content='0'>";

      }
  }
  else
  {   
   echo "<script>
         alert(' Invalide Username');
          </script>";
   echo "<meta http-equiv='refresh' content='0'>";
  }
}
else {
   echo "<script>
         alert(' New password can not be empty');
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
  <title>Pinelands Music School | Portal</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- skin -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../css/elements.css">

  
</head>
<body class="hold-transition skin-blue sidebar-mini">


<!--password change pop up-->
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<form method="post" action="" id="change">
<i id ="close" class="fa fa-times fa-2x" onclick ="div_hide()"></i>
  <h2>Change password</h2>
  <hr>
  <div class="form-group">
    <label>Username * </label>
    <input class="form-control" type="text" name="username"> 
    <span class="error"></span>
  </div>
  <div class="form-group">
    <label>Old password * </label>
    <input class="form-control" type="password" name="oldpassword"> 
    <span class="error"></span>
    
  </div>
  
  <div class="form-group">
    <label>New password * </label><br>
    <input class="form-control" type="password" name="newpassword" >
    <span class="error"><?php echo $err;?></span>
  </div>  
  <div class="box-footer" >
      <input type="submit" class="btn btn-primary" name="Change" value="Change">
      </div>
</form>
<!-- Popup Div Ends Here -->
</div>
<!-- close pop up -->
</div>
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

	  <!-- user menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../image/profile.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["Name"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../image/profile.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["UserName"]; ?>
                  <small>Student</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
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
        
        <li class="">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Student Portal Home</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Student Study</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="timetable.php"><i class="fa fa-calendar-o"></i> My Timetable</a></li>
            <li><a href="enrolment.php"><i class="fa fa-bookmark"></i> My Enrolment</a></li>
            
          </ul>
        </li>
        <li>
          <a href="materials.php">
            <i class="fa fa-file-text"></i> <span>Learning Materials</span>
            
          </a>
        </li>
		<li>
          <a href="teachercontact.php">
            <i class="fa fa-phone"></i> <span>Teacher Contacts</span>
            
          </a>
        </li>
		<li>
          <a href="tools.php">
            <i class="fa fa-lightbulb-o"></i> <span>Tools</span>
            
          </a>
        </li>
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
                <div class="col-lg-12">
                    <!-- General details -->
                    <div style = "" class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-user"></i> General details
                        </div>

                        <div class="panel-body">
						    <div class="panel panel-primary no-boder">
                        <div style = "background-color:#F2F6F9;"class="panel-body yellow">
						<div class="col-lg-3">
                            <img src="../image/profile.png" alt="" style="width:150px;height:150px;margin-left:40px;">
						</div>
						<div class="col-lg-9">
						<div class="row">						
						    <h style="font-size:20px;"><b><?php echo $_SESSION["Name"]; ?></b></h>						
						</div>
						<div class="row">												    
							<h><?php echo $_SESSION["UserName"]; ?></h>							
						</div>
						<div style="background-color:white;margin-left:-15px;margin-top:15px"class="panel-body yellow">
                            <div class="row">	
							
							<i style="margin-left:10px"class="fa fa-calendar-o"></i>	
						    <h style="margin-left:5px">was born on</h>	
                            <h><b><?php echo $dob; ?></b></h>								
						</div>
						<div class="row">	
							
							<i style="margin-left:10px"class="fa fa-transgender"></i>	
						    <h style="margin-left:5px">identifies as a</h>	
                            <h><b><?php echo $gender; ?></b></h>									
						</div>
						<div class="row">	
							
							<i style="margin-left:10px"class="fa fa-globe"></i>	
						    <h style="margin-left:5px">is a</h>	
                            <h><b><?php echo $_SESSION["Roll"]; ?></b></h>								
						</div>
                        </div>
						</div>
                        </div>
                        
                    </div>
                            

                    </div>
                    <!--End Timeline -->
                </div>
            </div>
			</div>
			<div class="row">
			
		<div class="col-lg-12">
                    <!-- contact details-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Contact details
                        </div>
                        <div class="panel-body">
                            <div style="border-bottom-style:dotted;border-width: 1px;"class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>Primary contact number:</dt>
                                    <dd><?php echo $phone; ?></dd>
                                    <dt>Mailing address</dt>
                                    <dd><?php echo $mail; ?></dd>
                                    <dt>Home address:</dt>
                                    <dd><?php echo $address; ?></dd>
                                    <dt>Email address</dt>
                                    <dd><a><?php echo $email; ?></a>
                                    </dd>
                                </dl>
                            </div>
							
                            <div style="margin-left:5px;margin-top:5px"class="row">						
							    <i style="margin-left:10px" class="fa fa-share"></i>	
						        <a href="#" style="margin-left:5px">Update contact details</a>									
						    </div>
							<div style="margin-left:5px;"class="row">						
							    <i style="margin-left:10px"class="fa fa-share"></i>	
						        <a href ="#" onclick="div_show()" style="margin-left:5px">Change password</a>										
						    </div>
                        </div>

                    </div>
                    
                </div>
		</div>

    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    
    <strong>Copyright &copy; 2016 KeyboardSmashers.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
</script>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
