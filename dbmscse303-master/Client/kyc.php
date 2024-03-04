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

$clientNId = $_POST['nid'];
$clientDrivingLicenceNo = $_POST['drivinglicence'];
$clientvatRegNo = $_POST['vat'];

$kyc = "INSERT INTO `kyc_t`( `applicationId`, `clientNId`, `clientDrivingLicenceNo`, `clientvatRegNo`) 
VALUES (' $applicationId','$clientNId','$clientDrivingLicenceNo','$clientvatRegNo')";
$exe = mysqli_query($con,$kyc);

if ($exe)
{
    echo header("location:valueAddedService.html");
}



?>