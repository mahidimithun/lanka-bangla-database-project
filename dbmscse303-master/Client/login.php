<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "lankabangla";


$con = mysqli_connect($servername, $username, $password, $db);



$email =  $_POST['email'];
$pass = $_POST['password'];
$userType =$_POST['userType'];


$sql = "SELECT id, userType FROM logininfo_t WHERE email = '$email' AND pass = '$pass' AND (userType = 'client' OR userType ='relational Maneger' OR userType ='Head of Settelment')";


$result = mysqli_query($con, $sql);

if($userType == 'relational Maneger' OR $userType == 'Head of Settelment'){
    echo header("Location:relationalManeger.php");
  }
  else if($userType == 'admin'){
    echo header("Location:chart2.php");
  }

else if ($result && mysqli_num_rows($result) > 0) {

  
   
    $row = mysqli_fetch_assoc($result);
    $currentLoginID = $row['id'];

   
    $query = "SELECT clientCode, name FROM client_t WHERE login_id = '$currentLoginID' LIMIT 1";

    $clientResult = mysqli_query($con, $query);

    // Check if client data was found
    if ($clientResult && mysqli_num_rows($clientResult) > 0) {
        // Fetch and display client data
        $clientData = mysqli_fetch_assoc($clientResult);
        echo "Client ID: " . $clientData['clientCode'] . "<br>";
        echo "Client Name: " . $clientData['name'] . "<br>";
    } 
    else {
        echo "Client data not found. Redirecting to account opening form.";
        header("Location:accountOpeningForm.html");
        exit();
    }
}


 else {
    echo "Login failed. Invalid email, password, or user type.";
}
?>
