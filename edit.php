<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome  Back <?php echo htmlspecialchars($_SESSION["username"]); ?> </title>    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/edit.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. You can Update Your Details Here.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
	
<br>
<br>
<br>
<br>
<?php
    
if(isset($_GET['edit']))
{
     $db = mysqli_connect('localhost','root', '','naveen');
	  $id = $_GET['edit'];
	
    
	// Attempt select query execution
    $sql = "SELECT * from marathon where id= '".$id."'";
    $kl=mysqli_query($db,$sql);
	$name=mysqli_fetch_assoc($kl);
	?>
    
    
    
    <div class="container">
	    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading"><strong>Update  </strong> Form <span></span></h4>
                <div class="form">
                <form method="post" >
                    <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" readonly class="form-control" id="username" value="<?php echo $name['username']; ?>"   placeholder="Username" class="txt"/>
                    </div>
                    <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" name="date" readonly class="form-control" id="date" value="<?php echo $name['created_at']; ?>"   placeholder="Username" class="txt"/>
                    </div> 
                    <div class="form-group">
                    <label for="km">Km</label>
                    <input type="text" name="km"  class="form-control" id="km" value="<?php echo $name['km']; ?>"   placeholder="update km here" class="txt"/>
                    </div>    
                    <input type="submit" value="update" name="update" class="txt2">
                    <input type="submit" value="delete" name="delete" class="txt2">
                </form>
            </div>
            </div>
        </div>
	</div>
 
    <div class="footer">
        © <?php echo date("Y"); ?> Copyright.
    </div>
    
<?php	
}

?>
<?php
if(isset($_POST['update']))
{
$db = mysqli_connect('localhost','root', '','naveen');
	$get=$_POST['km'];
	$id=$_GET['edit'];
	$query="update marathon set km='$get' where id='$id'";
	$up=mysqli_query($db,$query);
	header('location:welcome.php');
}
if(isset($_POST['delete']))
{
$db = mysqli_connect('localhost','root', '','naveen');
	$id=$_GET['edit'];
	$query="DELETE FROM marathon where id='$id'";
	$up=mysqli_query($db,$query);
	header('location:welcome.php');
}
?>

</body>
</html>