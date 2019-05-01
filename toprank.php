<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		th{text-align: center}
        td{color: white}
        .naveen1{
            background-color: green;
        }
        .naveen2{
            background-color: coral;
        }
        .naveen3{
            background-color: dodgerblue;
        }
    </style>
</head>
<body>
<div class="container">
<h3> Top Runners <i class="glyphicon glyphicon-road"></i> </h3>
<?php	

// Include config file
require_once "config.php";

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	// Attempt select query execution
$top = "SELECT username, SUM(km) as kilo FROM marathon GROUP BY username ORDER BY kilo DESC LIMIT 3";
$counts = 1;
$css=1;    
if($results = mysqli_query($link, $top)){
    if(mysqli_num_rows($results) > 0){
		
		echo"<div class='limiter'>";
	    echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "<table class = 'table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'><strong>#</strong></th>";
                echo "<th scope='col'><strong>USERNAME</strong></th>";
                echo "<th scope='col'><strong>KM</strong></th>";
            echo "</tr>";
            echo "</thead>";
			
        while($rows = mysqli_fetch_array($results)){
            echo "<tr class='naveen".$css++."'>";
                echo "<td>".$counts++.  "</td>";
                echo "<td>" . $rows['username'] . "</td>";
                echo "<td>" . $rows['kilo'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
		
		echo"</div>";
        // Free result set
        mysqli_free_result($results);
    } else{
        echo "</br>";
        echo "</br>";
        echo "</br>";
            echo "<table class = 'table table-bordered '>";
            echo "<thead>";
            echo "<tr>";
                echo "<th>S.No</th>";
                echo "<th>username</th>";
                echo "<th>KM</th>";
            echo "</tr>";
            echo "</thead>";
            echo"</table>";
        echo "<div class='alert alert-primary' role='alert'>No records matching your query were found.</div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// close connection
?>   
</div>
</body>
</html>