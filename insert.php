<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "", "demo");
 
  session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link,$_REQUEST["username"]);
$km = mysqli_real_escape_string($link, $_REQUEST['km']);

//$email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// attempt insert query execution
$sql = "INSERT INTO marathon (username, km) VALUES ('$username', '$km')";
if(mysqli_query($link, $sql)){
    header('Location: welcome.php'); 
} else{
	header('Location: welcome.php'); 
    
}
 
// close connection
mysqli_close($link);
?>