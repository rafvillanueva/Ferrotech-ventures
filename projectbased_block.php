
<?php
include('dbcon.php');
$id=$_GET['id'];

mysql_query("UPDATE table_list set record_status = 'block' where id='$id'");

echo "<script>alert('Successfully block!'); window.location='projectbased_list.php'</script>";

?>



