<?php
 
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
    <title>Marathon </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<form action="insert.php" method="post">
	<div class="container">
	<p>
	<div class="form-group" >
    	<label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
	</div>
	</p>
    <p>
	<div class="form-group" >
    	<label for="km">Kilo Meters</label>
        <input type="number" name="km" class="form-control" id="km">
	</div>
    </p>
    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Records">
    </div>
</form>
</body>
</html>