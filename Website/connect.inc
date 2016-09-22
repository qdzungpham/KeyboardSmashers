<?php
session_start();
try{
   $conn = new PDO('mysql:host=localhost;dbname=music_school', 'root', '12345');  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



if (isset($_GET['logout'])){
  header('location:home.php');
	session_destroy();
	exit();
}
  ?>