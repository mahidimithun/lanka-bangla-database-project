<?php
$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);


$btable ="SELECT applicationid FROM bo_t order by applicationid desc limit 1";
$exe = mysqli_query($con,$btable);

$row = mysqli_fetch_assoc($exe);
    $applicationId = $row['applicationid'];

$internetTrading = $_POST['it'];
$location = $_POST['location'];
$services = $_POST['service'];
$value= "INSERT INTO `value_added_service_t`( `internetTrading`, `location`, `applicationId`, `services`)
 VALUES ('$internetTrading','$location',' $applicationId','$services')";
 $exe = mysqli_query($con,$value);

 if ($exe){
    echo "All Forms are submitted successfully";
 }
?>