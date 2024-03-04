<?php
$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);

$email= $_POST['email'];
$pass = $_POST['password'];
$conpass = $_POST['conpassword'];
$userType = $_POST['userType'];


$sql = "INSERT INTO `logininfo_t`(`email`, `pass`, `conpass`, `userType`) VALUES ('$email','$pass','$conpass ','$userType')";
if($pass==$conpass){
$result = mysqli_query($con,$sql);
if ($result){
    echo header("Location:signin.html");
  }
}

?>