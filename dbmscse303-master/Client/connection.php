<?php
$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);

// if (!$con){
//     echo "Could not connect to server";
// }
// else{
//     echo "Connecting to server successfully df";
// }


//1st account holder

// $title= $_POST["ctitle"];
// $name= $_POST["cname"];
// $email = $_POST["cemail"];
// $phoneNo = $_POST["cphone"];	
// $presentAddress = $_POST["cpreaddress"];
// $permanentAddress = $_POST["cperaddress"];
// $gender = $_POST["gender"];
// $dob = $_POST["cdob"];
// $bankCode = $_POST["bcode"];
// $branchCode = $_POST["bbcode"];
// $routingNo = $_POST["brcode"];
// $bankAccountNo = $_POST["banumber"];
// $branch = $_POST["branch"];
// $eTin = $_POST["cetin"];
// $fatherName = $_POST["cfatherName"]; 
// $motherName = $_POST["cmotherName"];
// $spouseName = $_POST["cspouseName"] ;
// $occupation = $_POST["coccupation"];

// //joint accoutn information
// $jointClientTitle= $_POST["jtitle"];
// $jointClientName = $_POST["jname"];
// $jointClientFatherName = $_POST["jfathername"];
// $jointClientMotherName = $_POST["jmothername"];
// $jointClientSpouseName = $_POST["jspousename"];
// $jointClientAddress = $_POST["jpreaddress"];
// $jointClientPhone = $_POST["jphone"];
// $jointClientMobile = $_POST["jmobile"];
// $jointClientEmail = $_POST["jemail"];
// $jointClientCity = $_POST["jcity"];
// $jointClientPostCode = $_POST["jpostcode"];	
// $jointClientCountryCode = $_POST["jcountrycode"];
// $joinClientNid = $_POST["jnid"];
// $jointClientEtin = $_POST["jetin"];
// $jointClientOccupation = $_POST["joccupation"];
// $jointClientDob = $_POST["jdob"];
// $jointClientSignature = $_POST["jpicture"];
// $jointClientPhoto =  $_POST["jsignature"];
// $jointClientNidPhoto = $_POST["jnidpicture"];
// $jointClientNationality = $_POST["jnationality"];
// $jointClientGender = $_POST["jgender"];
// $jointClientPermanentAddress = $_POST["jperaddress"];


// $chk = "SELECT email from client_t ";
// $exe = mysqli_query($con, $chk);
// $count = mysqli_fetch_array($exe);

// if ($count>=1){
//     echo " already exists";
// }

// else{


    // $chk = "SELECT c.login_id  FROM logininfo_t l inner join client_t c on l.id = c.login_id ";
    // $exe = mysqli_query($con,$chk);
   

    // if(mysqli_num_rows($exe)>=1){

    //     echo "already registered";
    // }
    //     else{
           
    $ctable ="SELECT id FROM logininfo_t where userType='Client' order by id desc limit 1";
    $exe = mysqli_query($con,$ctable);

    $row = mysqli_fetch_assoc($exe);
    $loginid = $row['id'];
        

        //1st account holder

$title= $_POST["ctitle"];
$name= $_POST["cname"];
$email = $_POST["cemail"];
$phoneNo = $_POST["cphone"];	
$presentAddress = $_POST["cpreaddress"];
$permanentAddress = $_POST["cperaddress"];
$gender = $_POST["gender"];
$dob = $_POST["cdob"];
$bankCode = $_POST["bcode"];
$branchCode = $_POST["bbcode"];
$routingNo = $_POST["brcode"];
$bankAccountNo = $_POST["banumber"];
$branch = $_POST["branch"];
$eTin = $_POST["cetin"];
$fatherName = $_POST["cfatherName"]; 
$motherName = $_POST["cmotherName"];
$spouseName = $_POST["cspouseName"] ;
$occupation = $_POST["coccupation"];

//joint accoutn information
$jointClientTitle= $_POST["jtitle"];
$jointClientName = $_POST["jname"];
$jointClientFatherName = $_POST["jfathername"];
$jointClientMotherName = $_POST["jmothername"];
$jointClientSpouseName = $_POST["jspousename"];
$jointClientAddress = $_POST["jpreaddress"];
$jointClientPhone = $_POST["jphone"];
$jointClientMobile = $_POST["jmobile"];
$jointClientEmail = $_POST["jemail"];
$jointClientCity = $_POST["jcity"];
$jointClientPostCode = $_POST["jpostcode"];	
$jointClientCountryCode = $_POST["jcountrycode"];
$joinClientNid = $_POST["jnid"];
$jointClientEtin = $_POST["jetin"];
$jointClientOccupation = $_POST["joccupation"];
$jointClientDob = $_POST["jdob"];
$jointClientSignature = $_POST["jpicture"];
$jointClientPhoto =  $_POST["jsignature"];
$jointClientNidPhoto = $_POST["jnidpicture"];
$jointClientNationality = $_POST["jnationality"];
$jointClientGender = $_POST["jgender"];
$jointClientPermanentAddress = $_POST["jperaddress"];
   
$data= "INSERT INTO `client_t` ( `title`, `name`, `email`, `phoneNo`, `presentAddress`, `permanentAddress`, `gender`, `dob`, `bankCode`, `branchCode`, `routingNo`, `bankAccountNo`, `photo`, `clientSignature`, `branch`, `eTin`, `fatherName`, `motherName`, `spouseName`, `occupation`, `relationalManagerID`, `login_id`) 
VALUES ( '$title', '$name', '$email', '$phoneNo', '$presentAddress', '$permanentAddress', '$gender' , '$dob', '$bankCode', '$branchCode', '$routingNo', '$bankAccountNo ', NULL, NULL, '$branch', '$eTin', '$fatherName', '$motherName', '$spouseName', '$occupation', NULL, '$loginid')";

$result= mysqli_query($con,$data);
if($result){
    echo header('location:boForm.html');
}

// }
//$count = mysqli_num_rows($exe);
// if ($count>=1){
//     echo header('location:boForm.html');
// }
// else{
//     echo "not found";
// }

if (!empty($jointClientName)){
 $superTypeClientCode = $con->insert_id;

$data= "INSERT INTO `joint_account_t` (`jointclientCode`,`jointClientTitle`, `jointClientName`, `jointClientFatherName`, `jointClientMotherName`, `jointClientSpouseName`, `jointClientAddress`, `jointClientPhone`, `jointClientMobile`, `jointClientEmail`, `jointClientCity`, `jointClientPostCode`, `jointClientCountryCode`, `joinClientNid`, `jointClientEtin`, `jointClientOccupation`, `jointClientDob`, `jointClientSignature`, `jointClientPhoto`, `jointClientNidPhoto`, `jointClientNationality`, `jointClientGender`, `jointClientPermanentAddress`)
VALUES ('$superTypeClientCode', '$jointClientTitle', '$jointClientName', '$jointClientFatherName ', '$jointClientMotherName', '$jointClientSpouseName', '$jointClientAddress', '$jointClientPhone', '$jointClientMobile', '$jointClientEmail', '$jointClientCity', '$jointClientPostCode', '$jointClientCountryCode', '$joinClientNid', '$jointClientEtin', '$jointClientOccupation', '$jointClientDob', '$jointClientSignature', '$jointClientPhoto', '$jointClientNidPhoto', '$jointClientNationality', '$jointClientGender', '$jointClientPermanentAddress')";

$result= mysqli_query($con,$data);

}

//auth information
$authTitle = $_POST ['atitle'];
$authName= $_POST ['aname'];
$authFatherName = $_POST ['afatherName'];
$authMotherName = $_POST ['amotherName'];
$authSpouseName = $_POST ['aspouseName'];
$authAddress = $_POST ['apreaddress'];
$authPhone = $_POST ['aphone'];
$authMobile = $_POST ['amobile'];
$authEmail = $_POST ['aemail'];
$authCity = $_POST ['acity'];
$authPostCode = $_POST ['apostcode'];
$authCountryCode = $_POST ['acountrycode'];
$authClientNid = $_POST ['aNid'];
$authEtin = $_POST ['aetin'];
$authClientOccupation = $_POST ['aOccupation'];
$authClientDob = $_POST ['adob'];
$authClientSignature = $_POST ['asignature'];
$authClientPhoto = $_POST ['apicture'];
$authClientNidPhoto = $_POST ['anidpicture'];
$authClientNationality = $_POST ['aNationality'];
$authClientGender = $_POST ['agender'];
$authClientPermanentAddress = $_POST ['aperaddress'];

if (!empty($authName)){

$data= "INSERT INTO `company_account_t`(`companyClientCode`, `authTitle`, `authName`, `authFatherName`, `authMotherName`, `authSpouseName`, `authAddress`, `authPhone`, `authMobile`, `authEmail`, `authCity`, `authPostCode`, `authCountryCode`, `authClientNid`, `authEtin`, `authClientOccupation`, `authClientDob`, `authClientSignature`, `authClientPhoto`, `authClientNidPhoto`, `authClientNationality`, `authClientGender`, `authClientPermanentAddress`)
VALUES ('$superTypeClientCode','$authTitle','$authName','$authFatherName','$authMotherName','$authSpouseName','$authAddress','$authPhone','$authMobile','$authEmail','$authCity','$authPostCode','$authCountryCode','$authClientNid','$authEtin','$authClientOccupation','$authClientDob','$authClientSignature','$authClientPhoto','$authClientNidPhoto','$authClientNationality','$authClientGender','$authClientPermanentAddress')";

$result= mysqli_query($con,$data);
}

    // }

  

// //bo form data
// $city= $_POST['bcity'];
// $postCode = $_POST['bpost'];
// $state = $_POST['state'];
// $country = $_POST['country'];
// $telephone = $_POST ['tel'];
// $fax = $_POST ['fax'];
// $passportNo = $_POST ['passno'];
// $issuePlace = $_POST ['issueplace'];
// $issueDate = $_POST ['issuedate'];
// $expiryDate = $_POST ['expirydate'];
// $introducerId = $_POST ['introducerid'];




// $data4= "INSERT INTO `bo_t`(`clientCode`,`city`, `postCode`, `state`, `country`, `telephone`, `fax`, `passportNo`, `issuePlace`, `issueDate`, `expiryDate`, `introducerId`) 
// VALUES ('$superTypeClientCode','$city','$postCode','$state','$country ','$telephone','$fax','$passportNo','$issuePlace','$issueDate','$expiryDate','$introducerId')";
// $exe = mysqli_query($con,$data4);

?>
