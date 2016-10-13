<?php
// php code to connect to database
session_start();
try{
   $conn = new PDO('mysql:host=localhost;dbname=pinelands_music_school', 'root', '');  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


// logout button
if (isset($_GET['logout'])){
  header('location:home.php');
	session_destroy();
	exit();
}

function portal_ckeck()
{
  
  if (!isset($_SESSION["Roll"]))
  {
    header('location:../home.php');
  } else if($_SESSION["Roll"] == "teacher")
  {
      header('location:teacherportal/index.php');
  }

}

function teacherportal_ckeck()
{
  
  if (!isset($_SESSION["Roll"]))
  {
    header('location:../../home.php');
  } else if($_SESSION["Roll"] == "student")
  {
      header('location:../index.php');
  }

}


function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}

// The test function that removes whitespace and other unnecessary characters,
//  strips backslashes and prevents xss insertion.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function classcheck($class){
  if($class == "PIA101"){
    $color="#f56954";//red
  }
  else if($class == "VIL101"){
    $color="#f39c12";//yellow
  }
  else if($class == "GUI201"){
    $color="#00a65a";//green
  }
  else {
    $color="#3c8dbc";//main color
  }
  return $color;
}

?>
