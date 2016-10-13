
<?php
require "../connect.inc";
portal_ckeck();

//get the class data
$id=$_SESSION["UserID"];
$classsql = "SELECT * FROM `classes`,`studentclass` 
        WHERE `classes`.classID = `studentclass`.classID
        AND `studentclass`.studentID= '$id'";
$classrs = $conn->prepare($classsql);
$classrs -> execute();
$classrecord = $classrs->FetchALL(PDO::FETCH_ASSOC);




//get data forthe music instrument 

$action="";
$sql = "SELECT * FROM `instruments`";
$rs = $conn->prepare($sql);
$rs -> execute();
$record = $rs->FetchALL(PDO::FETCH_ASSOC);


//get data from instrumenthire base on student id
$query = "SELECT * FROM `instrumenthire`,`instruments` WHERE `instrumenthire`.`studentID`='$id' and
`instrumenthire`.`instrumentID`= `instruments`.`instrumentID`";
$results = $conn->prepare($query);
$results -> execute();
$row = $results->FetchALL(PDO::FETCH_ASSOC);
foreach($row as $info)
{
$instrumentID=$info['instrumentID'];

}


//when rent button click
if(isset($_POST['rent']))
{
  $startDate=date("Y-m-d");
  $endDate=date('Y-m-d',strtotime("+3 month"));
  if(!empty($_POST['check_list']))
  {
    foreach($_POST['check_list'] as $selected)
    {   
     
    if (count($row)>0)
    {    
          if($info['instrumentID']==$selected)
          {
            $rentQuantity= $info['quantity']+1;
            $sql="UPDATE `instrumenthire` SET `quantity`='$rentQuantity' WHERE `instrumentID`='$selected' and 
             `studentID`='$id'";
            $rs = $conn->prepare($sql);
            $rs -> execute();
            header('location:materials.php');
          }
          else 
          {
            $rentQuantity='1';
             $sql="INSERT INTO `instrumenthire`(`studentID`,`instrumentID`,`startDate`,`endDate`,`quantity`)
                      VALUES('$id','$selected','$startDate','$endDate','$rentQuantity')";
                      $rs = $conn->prepare($sql);
          $rs -> execute();
          header('location:materials.php');
          }
      }
      else
      {
             $rentQuantity='1';
             $sql="INSERT INTO `instrumenthire`(`studentID`,`instrumentID`,`startDate`,`endDate`,`quantity`)
                      VALUES('$id','$selected','$startDate','$endDate','$rentQuantity')";
                      $rs = $conn->prepare($sql);
          $rs -> execute();
          header('location:materials.php');
      }
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
        <li class="treeview">
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
            <li><a href="enrolment.php"><i class="fa fa-bookmark"></i> My Enrolment</a></li>
            
          </ul>
        </li>
        <li class="active">
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
        Learning Materials
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	    <div class="row">
            <div class="col-md-12">
			    <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
            <?php 
            
          foreach($classrecord as $class){
              echo '
              <div class="tab-content">
              <div id="'.$class["classIdname"].'">
                  <div class="box box-solid">
                     <div class="box-header with-border">
                        <h3 class="box-title">'.$class["className"].' <b>'
                        .$class["classIdname"].'</b></h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
					    <p><b>Attached Files:<b><p>
						<p>
						<a href="#">MSC101_Lession1 - How to Read Sheet Music.pdf</a><br>
						<a href="#">MSC101_Lession1 - Your First Lesson on the Piano.pdf</a><br>
						<a href="#">MSC101_Lession2 - How to Read Music Notes for Piano.pdf</a><br>
						<a href="#">MSC101_Lession2 - Reading Music Notes on Treble Clef and Bass Clef.pdf</a><br>
						<a href="#">MSC101_Lession3 - How to Read Sheet Music.pdf</a>
					    </p>
                
                     </div>
                     <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
				  
              </div>
              <!-- /.tab-pane -->
             </div>
            <!-- /.tab-content -->
            ';}
            echo '
          </div>
          <!-- nav-tabs-custom -->';
          ?>
			
		</div>

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Instruments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
      
        <!-- table for available instruments -->
              <table class="table">
                <tr>
                  <th >Instrument</th>
                  <th>Description</th>
                  <th>Rental Cost (per month)</th>
                  <th >Start Date</th>
                  <th>End Date</th>
                  <th>Quantity</th>
                </tr>
                <?php 
                foreach($row as $info)
                 { 
                  $instrumentID=$info['instrumentID'];     
                  $type=$info['instrumentType'];
                  $description=$info['conditionQuality'];
                  $rentalcost=$info['hireCost'];
                  $start=$info['startDate'];
                  $end=$info['endDate'];
                  $rentquantity=$info['quantity'];
                echo '
                <tr>
                  <td><img src="dist/img/'.$type.'.png" alt="" style="width:100px;height:100px"></td>
                  <td>'.$description.'</td>
                  <td><span class="badge bg-green">'.$rentalcost.'</span></td>
                  <td>
                    <span class="badge bg-yellow">'.$start.'</span>
                  </td>
                  <td><span class="badge bg-blue">'.$end.'</span></td>
                  <td><span class="badge bg-red">'.$rentquantity.'</span></td>
                </tr>';
                }
                ?>
               
              </table>     
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		
		<!-- music instruments -->
		<div class="col-md-12">
		    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Music Instruments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
			
			  <!-- table for available instruments -->
        <form action="" method="post">
              <table class="table">
                <tr>
                  <th style="width:150px">Instrument</th>
                  <th>Description</th>
                  <th>Rental Cost (per month)</th>
                  <th style="width: 300px">Availablility</th>
                  <th>Select</th>
                </tr>
                <?php 
                foreach($record as $data)
                 { 
                  $instrumentID=$data['instrumentID'];     
                  $type=$data['instrumentType'];
                  $description=$data['conditionQuality'];
                  $cost=$data['hireCost'];
                  $quantity=$data['Quantity'];
                  if($quantity>0)
                  {
                     $status="success";
                     $value="Available";
                     $action="<div class='checkbox icheck'>
                                  <input type='checkbox' value='$instrumentID' name='check_list[]'>
                              </div>";
                  }
                  else {
                    $status="danger";
                    $value="Unavailable";
                    $action="";
                  }
                echo '
                <tr>
                  <td><img src="dist/img/'.$type.'.png" alt="" style="width:100px;height:100px"></td>
                  <td>'.$description.'</td>
                  <td>
                    <span class="badge bg-yellow">'.$cost.'</span>
                  </td>
                  <td><span style="width:100px" class="btn btn-'.$status.' btn-xs">'.$value.'</span></td>
                  <td>'.$action.'</td>
                </tr>';
                }
                ?>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input class="btn btn-primary btn-block btn-flat" 
                type="submit" name="rent" value="Rent"></td>
                </tr>
               
              </table>
          </form>     
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      

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
