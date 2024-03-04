<?php


$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);


$query = "SELECT c.clientCode, c.name, jc.jointClientName, co.authName, b.applicationid
FROM client_t c
LEFT JOIN joint_account_t jc ON c.clientCode = jc.jointclientCode
LEFT JOIN company_account_t co ON c.clientCode = co.companyClientCode
LEFT JOIN bo_t b ON b.clientCode= c.clientCode;";
          
$result = mysqli_query($con,$query);
    
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


        <title>Relational Manager</title>
    </head>
    <body>



        <!-- table -->

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">client id</th>
                <th scope="col">name</th>
                <th scope="col">Joint Clilent Name</th>
                <th scope="col">Authorized Clilent Name</th>
                <th scope="col">Bo Application ID</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                
                ?>
                    <td> <?php echo $row['clientCode'] ?></td>
                    <td> <?php echo $row['name'] ?> </td>
                    <td> <?php echo $row['jointClientName'] ?> </td>
                    <td> <?php echo $row['authName'] ?> </td>
                    <td> <?php echo $row['applicationid'] ?> </td>
                    
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>

        <!-- table end -->

        <!-- Bootstrap JS bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </body>
</html>
