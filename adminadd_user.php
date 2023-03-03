
<!--DATABASE NAME-->

<?php
include('dbcon.php');
if (isset($_POST['btn_add_user'])) 
  {

          $username=$_POST['username'];
          $password=$_POST['password'];
      
      
          

mysql_query("INSERT into user(username,password)
values('$username','$password')");


echo "<script>alert('Success! New Account Created.'); window.location='adminlist_user.php'</script>";



     }

     
?>