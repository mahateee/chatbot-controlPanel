<?php
error_reporting(0);
$servername = "localhost";
$username = "root";

echo $motor1 = $_POST['motorvalue1'];
$motor2 = $_POST['motorvalue2'];
$motor3 = $_POST['motorvalue3'];
$motor4 = $_POST['motorvalue4'];
$motor5 = $_POST['motorvalue5'];
$motor6 = $_POST['motorvalue6'];

try{
  $conn = new PDO("mysql:host=$servername;dbname=smartmethod", $username);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 $conn->beginTransaction();

 if(isset($_POST['save'])){
  $conn->exec("INSERT INTO motors (motorvalue1, motorvalue2, motorvalue3, motorvalue4, motorvalue5, motorvalue6)
  VALUES ('$motor1', '$motor2', '$motor3', '$motor4', '$motor5', '$motor6')");
 }

if(isset($_POST['onvalue']))
{
 $conn->exec("INSERT INTO motors (motorvalue1, motorvalue2, motorvalue3, motorvalue4, motorvalue5, motorvalue6, onvalue)
  VALUES ('$motor1', '$motor2', '$motor3', '$motor4', '$motor5', '$motor6',1)");
}


  $conn->commit();
  echo "New records created successfully";
} catch(PDOException $e) {
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;

?>