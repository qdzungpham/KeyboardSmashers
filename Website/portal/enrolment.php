<?php
require "../connect.inc";
portal_ckeck();
$id=$_SESSION["UserID"];
$status = 'New';

//get the data from studentcalss table for register
$classsql = "SELECT * FROM `classes`,`studentclass` 
            WHERE `classes`.classID=`studentclass`.classID 
            and `studentclass`.studentID='$id'";
$classrs = $conn->prepare($classsql);
$classrs -> execute();
$classrecord = $classrs->FetchALL(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM `classes` order by `classIdname` ASC";
$rs = $conn->prepare($sql);
$rs -> execute();
$record = $rs->FetchALL(PDO::FETCH_ASSOC);



if (isset($_POST['save']))
{
   if(!empty($_POST['check']))
  {
    if (count($_POST['check'])>=2 && count($_POST['check'])<=3)
    {
      if($status != 'New')
      {
        if(!count($classrecord)>0)
        {
          $check=$_POST['check'];
          foreach($check as $class)
          {
              $sql = "INSERT INTO `studentclass`(`classID`,`studentID`) VALUES('$class','$id')";
              $rs = $conn->prepare($sql);
              $rs -> execute();
              $classsql = "SELECT * FROM `classes`,`studentclass` 
                          WHERE `classes`.classID=`studentclass`.classID 
                          and `studentclass`.studentID='$id'";
              $classrs = $conn->prepare($classsql);
              $classrs -> execute();
              $classrecord = $classrs->FetchALL(PDO::FETCH_ASSOC);
              foreach($classrecord as $data)
                {
                   $classcapacity=$data['classCapacity'];
                   $classcapacity = $classcapacity-1;
                }
              $sql = "UPDATE `classes` SET `classCapacity` = $classcapacity
              WHERE `classes`.`classID` = '$class'";
              $rs = $conn->prepare($sql);
              $rs -> execute();
              echo "<meta http-equiv='refresh' content='0'>";
              header('location:timetable.php');
          }
        }
       else
        {
          echo "<script>
                alert('You have already registered in some classes');
                </script>";
         echo "<meta http-equiv='refresh' content='0'>";
        }
      }
      else 
      {
        if ($status == 'New'){
        echo "<script>
                alert('You can only register for one class');
                </script>";
         echo "<meta http-equiv='refresh' content='0'>";
       }
       
      }
    }
    else if(count($_POST['check'])==1)
    {
        if(!count($classrecord)>0)
        {
          $check=$_POST['check'];
          foreach($check as $class)
          {
              $sql = "INSERT INTO `studentclass`(`classID`,`studentID`) VALUES('$class','$id')";
              $rs = $conn->prepare($sql);
              $rs -> execute();
              $classsql = "SELECT * FROM `classes`,`studentclass` 
                          WHERE `classes`.classID=`studentclass`.classID 
                          and `studentclass`.studentID='$id'";
              $classrs = $conn->prepare($classsql);
              $classrs -> execute();
              $classrecord = $classrs->FetchALL(PDO::FETCH_ASSOC);
              foreach($classrecord as $data)
                {
                   $classcapacity=$data['classCapacity'];
                   $classcapacity = $classcapacity-1;
                }
              $sql = "UPDATE `classes` SET `classCapacity` = $classcapacity
              WHERE `classes`.`classID` = '$class'";
              $rs = $conn->prepare($sql);
              $rs -> execute();
              echo "<meta http-equiv='refresh' content='0'>";
              header('location:timetable.php');
          }
        }
       else
        {
          echo "<script>
                alert('You have already registered in some classes');
                </script>";
         echo "<meta http-equiv='refresh' content='0'>";
        }
      }
      else {
        echo "<script>
                alert('You can only register for maxmum There classes');
                </script>";
         echo "<meta http-equiv='refresh' content='0'>";
       }
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
  <!-- skins -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
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
      <!-- Sidebar user panel -->
      
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
            <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="timetable.php"><i class="fa fa-calendar-o"></i> My Timetable</a></li>
            <li class="active"><a href="enrolment.php"><i class="fa fa-bookmark"></i> My Enrolment</a></li>
            
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
        My Enrolment
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	    
            <div class="col-md-12">
			<div class="box">
       <div class="box-header">
            <i class="fa fa-book"></i>
            <h3 class="box-title">Important Information:</h3>
              
      </div>
       <div class="box-body table-responsive no-padding">
       <span style="margin-left:20%; color:blue; font-size: 18px;">!!! You Are identify as a <span style="color:red;"><?php echo $status; ?></span> student 
       which can only register one lesson per week.</span> 
       </div>
      </div>
		  <!-- class registration -->
          <div class="box">                                                               
            <div class="box-header">
			<i class="fa fa-pencil-square-o"></i>
              <h3 class="box-title">Class Registration</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			
			  <!-- table for class list -->
       <form method="POST" action="enrolment.php">
              <table class="table table-hover">
            
                <tr>
                  <th>Class Name</th>                  
                  <th>Class Code</th>
                  <th>Teacher Name</th>
                  <th>Day-Time</th>
                  <th>Class Capacity</th>
                  <th>Register</th>
                </tr>
                <?php 
                foreach($record as $data){
                  $teacherid = $data["teacherID"];
                  $query = "SELECT `firstName`,`familyName` FROM `teachers` WHERE teacherID= '$teacherid'";
                  $results = $conn->prepare($query);
                  $results -> execute();
                  $row = $results->FetchALL(PDO::FETCH_ASSOC);
                  foreach ($row as $info) {
                    $teacherName=$info["firstName"].' '.$info["familyName"];
                  }
                  if($data["classCapacity"]<1){
                    $capacity= '<span class="badge bg-red">Class Full</span>';
                     $register=' ';
                  }
                  else {
                    $capacity='<span class="badge bg-yellow">'.$data["classCapacity"].' available</span>';
                    $register='<div class="checkbox icheck">
                                       <label>
                                           <input name="check[]" 
                                           type="checkbox" value="'.$data["classID"].'"><span id="label" 
                                           class ="btn btn-success">Register</span>
                                       </label>
                                   </div>';
                   
                  }
                echo '<tr>
                  <td>'.$data["className"].'</td>
                  <td>'.$data["classIdname"].'</td>
                  <td>'. $teacherName.'</td>
                  <td>'.$data["classDay"].' '.$data["startTime"].'-'.$data["endTime"].'</td>
                  <td>'.$capacity.'</td>
                  <td>'.$register.'</td>
                </tr>';}
                ?>
                <tr>
                   
                <td><input class="btn btn-success" type="submit" name="save" value="Submit">
                <input class="btn btn-danger" type="reset" name="reset" value="Reset">

                </td>
                </tr>
                
              </table>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

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
<script src="plugins/iCheck/icheck.min.js"></script>
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
