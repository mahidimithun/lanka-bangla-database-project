<?php
$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);


// $ctable ="SELECT clientCode FROM client_t order by clientCode desc limit 1";
// $exe = mysqli_query($con,$ctable);

// $row = mysqli_fetch_assoc($exe);
//     $clientCode = $row['clientCode'];



$btable ="SELECT applicationid FROM bo_t order by applicationid desc limit 1";
$exe = mysqli_query($con,$btable);

$row = mysqli_fetch_assoc($exe);
    $applicationId = $row['applicationid'];


$eft = "INSERT INTO `eft_t`( `applicationId`) VALUES ('$applicationId')";

$exe = mysqli_query($con,$eft);


$eftcode = $con->insert_id;

//$productType=$_POST['ptype'];

$products = $_POST["ptype"];
 $pType = implode(", ",$products);


$eftp = "INSERT INTO `product_eft_t`(`productType`, `eftApplicationId`) VALUES ('$pType','$eftcode')";

$exe = mysqli_query($con,$eftp);

if ($exe)
{
    echo header("location:kyc.html");
}




?>