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
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		th{text-align: center}
    </style>
</head>
<body>
<div class="container">
<?php	

// Include config file
require_once "config.php";

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_GET['hist']))
{
	  $username = $_GET['hist'];
	
    
	// Attempt select query execution
$sql = "SELECT * from marathon where username= '".$username."'";
$count = 1;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		
		echo"<div class='limiter'>";
	
        echo "<table class = 'table table-bordered table-striped table-hover'>";
            echo "<thead>";
            echo "<tr>";
                echo "<th>S.No</th>";
                echo "<th>Username</th>";
                echo "<th>Date</th>";
                echo "<th>Km</th>";
                echo "<th>Edit</th>";
            echo "</tr>";
            echo "</thead>";
			
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>".$count++.  "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . $row['km'] . "</td>";
                echo "<td><a href='edit.php?edit=".$row['id']."'<button type='button' class='btn btn-primary'>Update</button></a></td>";
            echo "</tr>";
        }
        echo "</table>";
		
		echo"</div>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-primary' role='alert'>No records matching your query were found.</div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}


// close connection
mysqli_close($link);
?>
</div>
</body>
</html>