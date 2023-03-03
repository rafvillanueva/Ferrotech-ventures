<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-s8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title></title>
    <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
 <div class="box">
 	<center><img src="images/User_login_man_profile_account.png" width="50px" height="50px" ><p style="letter-spacing: 3px; font-size: 25px; color:white; font-weight:bold;">Administrator</p>
   
 	<form method="POST">
 		<div class="inputBox">
 			<input type="text" name="username" required="">
 			<label>Username</label>
 		</div>
 		<div class="inputBox">
 			<input type="password" name="password" required="">
 			<label>Password</label>
 		</div>
 		<input style="width: 70%; font-size:20px; letter-spacing: 6px;" type="submit" name="admin_submit" value="SUBMIT" class="btn btn-primary btn-md">
 	</form>
 </div>
</body>
</html>


<!--ADMIN-USER LOG-IN CODE-->
<?php
    session_start();
    mysql_connect("localhost","root","");
    mysql_select_db("hrisferrotech");

    if(isset($_POST['admin_submit'])){
      $un=$_POST['username'];
      $pw=$_POST['password'];
      $sql= mysql_query("SELECT password from user where username='$un'");
    
        if ($row = mysql_fetch_array($sql)) {
        if ($pw ==$row ['password']){
            $_SESSION['user'] = $un;
            echo "<script>window.location='home.php'</script>";
            
            exit();
                          }
    else
        echo"<script>alert('Invalid Password')</script>";
    }
    else
        echo"<script>alert('Invalid Username')</script>";
    }else{
        
        session_destroy();
        session_unset();
    }

?>
