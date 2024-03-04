<?php
session_start();

$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);



// if (isset($_SESSION['id'])) {
//    $login_id = $_SESSION['id'];
//    global $login_id;
//     // Now you can use $login_id in this file
//     //echo "Login ID: " . $login_id;




    

// }
$login_id = $_SESSION['login_id'];

echo "Login ID: " . $login_id;

$sql = "SELECT clientCode, name, login_id FROM client_t where login_id = '$login_id' limit 1";
       $result = mysqli_query($con,$sql);




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="/style.css">


        <title>|| Client - Dashboard ||</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Lanka Bangla</a>
            <button class="navbar-toggler" type="" data-toggle="collapse" data-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.html">Home</a>
                <a class="nav-item nav-link" href="accountOpeningForm.html">Account Opening Form</a>
                <a class="nav-item nav-link" href="boForm.html">BO Form</a>
                <a class="nav-item nav-link" href="creditFacilityForm.html">Credit Facility Form</a>
                <a class="nav-item nav-link" href="eftForm.html">EFT Form</a>
                <a class="nav-item nav-link" href="kyc.html">KYC Profile Form</a>
                <a class="nav-item nav-link" href="valueAddedService.html">Value Added Service Form</a>
                <a class="nav-item nav-link" href="#">Logout</a>
              </div>
            </div>
          </nav>


          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">client id</th>
                <th scope="col">name</th>
                <th scope="col">login id</th>
                
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                
                ?>
                    <td> <?php echo $row['clientCode'] ?></td>
                    <td> <?php echo $row['name'] ?> </td>
                    <td> <?php echo $row['login_id'] ?> </td>
                    
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
   


        <!-- Bootstrap JS bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </body>
</html>
