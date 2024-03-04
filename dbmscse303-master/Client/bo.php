<?php
$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);

$city= $_POST['bcity'];
$postCode = $_POST['bpost'];
$state = $_POST['state'];
$country = $_POST['country'];
$telephone = $_POST ['tel'];
$fax = $_POST ['fax'];
$passportNo = $_POST ['passno'];
$issuePlace = $_POST ['issueplace'];
$issueDate = $_POST ['issuedate'];
$expiryDate = $_POST ['expirydate'];
$introducerId = $_POST ['introducerid'];

$ctable ="SELECT clientCode FROM client_t order by clientCode desc limit 1";
$exe = mysqli_query($con,$ctable);

$row = mysqli_fetch_assoc($exe);
    $clientCode = $row['clientCode'];

$data= "INSERT INTO `bo_t`(`clientCode`,`city`, `postCode`, `state`, `country`, `telephone`, `fax`, `passportNo`, `issuePlace`, `issueDate`, `expiryDate`, `introducerId`) 
VALUES ('$clientCode','$city','$postCode','$state','$country ','$telephone','$fax','$passportNo','$issuePlace','$issueDate','$expiryDate','$introducerId')";
$exer = mysqli_query($con,$data);


if ($exer)
{
    echo header("location:eftForm.html");
}


?>