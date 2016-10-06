<?php
// php code to connect to database
session_start();
try{
   $conn = new PDO('mysql:host=localhost;dbname=pinelands_music_school', 'root', '12345');  
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

?>
