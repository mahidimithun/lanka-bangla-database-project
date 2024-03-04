<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$db = "lankabangla";

$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query data for division
$queryDivision = "SELECT state, COUNT(*) as division_count FROM bo_t GROUP BY state";
$resultDivision = mysqli_query($con, $queryDivision);

// Initialize arrays to store division names and counts
$divisionNames = [];
$divisionCounts = [];

// Fetch data and populate arrays for division
while ($row = mysqli_fetch_assoc($resultDivision)) {
    $divisionNames[] = $row['state'];
    $divisionCounts[] = $row['division_count'];
}

// Query data for branch
$queryBranch = "SELECT branch, COUNT(*) as branch_count FROM client_t GROUP BY branch";
$resultBranch = mysqli_query($con, $queryBranch);

$querygender = "SELECT gender, COUNT(*) as gender_Counts FROM client_t GROUP BY gender";
$resultgender = mysqli_query($con, $querygender);

// Initialize arrays to store branch names and counts
$branchNames = [];
$branchCounts = [];

$gender =[];
$genderCounts=[];

// Fetch data and populate arrays for branch
while ($row = mysqli_fetch_assoc($resultBranch)) {
    $branchNames[] = $row['branch'];
    $branchCounts[] = $row['branch_count'];
}

while ($row = mysqli_fetch_assoc($resultgender)) {
    $gender[] = $row['gender'];
    $genderCounts[] = $row['gender_Counts'];
}

// Convert data to JSON for JavaScript
$divisionDataJSON = json_encode([
    'divisionNames' => $divisionNames,
    'divisionCounts' => $divisionCounts,
]);

$branchDataJSON = json_encode([
    'branchNames' => $branchNames,
    'branchCounts' => $branchCounts,
]);

$genderDataJSON = json_encode([
    'gender' => $gender,
    'genderCounts' => $genderCounts,
]);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Plotly.js library -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <a class="nav-item nav-link" href="signin.html">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container text-center border border-danger rounded mt-3">
    <h3 class="boText">Administrator</h3>
  </div>

    <div class="container d-flex">
    <div id="divisionChart" style="width: 500px; height: 300px;"></div>

    <!-- Create a div for the Branch chart -->
    <div id="branchChart" style="width: 600px; height: 300px;"></div>
   <div id="genderChart" style="width: 600px; height: 300px;"></div>
</div>

    <script>
    
        var divisionData = <?php echo $divisionDataJSON; ?>;
        var branchData = <?php echo $branchDataJSON; ?>;
        var genderData = <?php echo $genderDataJSON; ?>;

     
        var divisionTrace = {
            x: divisionData.divisionNames,
            y: divisionData.divisionCounts,
            type: 'bar',
            name: 'Division',
        };

       
        var branchTrace = {
            x: branchData.branchNames,
            y: branchData.branchCounts,
            type: 'bar',
            name: 'Branch',
        };
        var genderTrace = {
            x: genderData.gender,
            y: genderData.genderCounts,
            type: 'bar',
            name: 'Division',
        };

        var divisionLayout = {
            title: 'Division Data Chart',
            xaxis: { title: 'Division' },
            yaxis: { title: 'Count' },
        };

        var branchLayout = {
            title: 'Branch Data Chart',
            xaxis: { title: 'Branch' },
            yaxis: { title: 'Count' },
        };
        var genderLayout = {
            title: 'Gender Data per division',
            xaxis: { title: 'gender' },
            yaxis: { title: 'Count' },
        };

        var divisionChartData = [divisionTrace];
        var branchChartData = [branchTrace];
        var genderChartData = [genderTrace];

        
        Plotly.newPlot('divisionChart', divisionChartData, divisionLayout);

      
        Plotly.newPlot('branchChart', branchChartData, branchLayout);
        Plotly.newPlot('genderChart', genderChartData, genderLayout);
    </script>


<!-- Bootstrap JS bundle -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
</body>
</html>
