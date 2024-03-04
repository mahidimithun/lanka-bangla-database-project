<?php
$servername = "localhost";
$username = "root";
$password ="";
$db = "lankabangla";

$con = mysqli_connect($servername,$username,$password, $db);


$query = "SELECT clientCode,name FROM client_t ";
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $code = $row['clientCode'];
}



?>