<!--
database connection & database Name...
-->

<?php
mysql_connect("127.0.0.1","root","");
mysql_select_db("hrisferrotech");
/* # Modification # */
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn, "hrisferrotech");

error_reporting(0);

session_start();
if(isset($_SESSION['user']) == ""){
	header("location: index.php");
}

?>
