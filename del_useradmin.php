
<?php
include('dbcon.php');
$id=$_GET['id'];

mysql_query("DELETE from user where id='$id'");


echo "<script>window.location='adminlist_user.php'</script>";


?>