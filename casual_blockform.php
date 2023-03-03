<?php
include 'dbcon.php';
$id=$_GET['id'];
?>


<!DOCTYPE html>
<html>
  <head>

     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Recruiting applicant tracking</title>
     <link rel="stylesheet" href="bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />

  </head>

<body style="font-weight: bold; font-family: oblique;">
    <?php 
     $table_list_query = mysql_query("SELECT * from tbl_applicants where a_id ='$id'");
     $table_list_rows = mysql_fetch_array($table_list_query);

     $table_list_query_1 = mysql_query("SELECT * from tbl_applicant_field where a_id ='$id'");
     $table_list_rows_1 = mysql_fetch_array($table_list_query_1);

     $table_list_query_2 = mysql_query("SELECT * from tbl_terminate where a_id ='$id'");
     $table_list_rows_2 = mysql_fetch_array($table_list_query_2);

     $table_list_query_3 = mysql_query("SELECT * from tbl_block where a_id ='$id' AND a_type = 'Casual'");
     $table_list_rows_3 = mysql_fetch_array($table_list_query_3); 
    ?>

  <div class="container">
    <div class="container" id="div-id-name" >
<form method="POST">
<table class="table table-bordered ">
 

<thead>
<tr>
      <th  colspan="5">     
      <div style="margin-top: 5px;">  
              <button type="submit" name="btn_block" class="btn btn-primary btn-md glyphicon glyphicon-check">Confirm</button>   
              <a href="employee_view.php?id=<?= $_GET['id'] ?>" type="button" class="btn btn-danger btn-md glyphicon glyphicon-remove">Cancel</a>
      </div>

              <center><h3 style="font-family: oblique; font-weight: bold; margin-top: -25px;"><img src="images/blocklist.jpg" height="45px">BLOCK EMPLOYEE</h3></center>
      </th>
</tr>


</thead>

<tbody>     
<tr>
  <td class="active">EMPLOYEE TYPE<input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['a_status']; ?>" disabled></input></td>
 <td class="active">Id number<input type="text" class="form-control"  name="idnumber" value="<?php echo $table_list_rows['a_id']; ?>" disabled></input></td>
 <td class="active">Full name<input type="text" class="form-control" value="<?php echo $table_list_rows['a_lname'];?> , <?php echo $table_list_rows['a_fname']; ?> <?php echo $table_list_rows['a_mname']; ?>" disabled></input></td>
 <td class="active">Position<input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['a_position']; ?>" disabled></input></td>
 <td class="active">Department<input type="text" class="form-control" name="department" value="<?php echo $table_list_rows_1['a_department']; ?>" disabled></input></td>

</tr>
<tr >
	<td colspan="5" style="background:rgb(118, 0, 0); "><center><label style="color: white; font-family: oblique; margin-top: 5px;">Please fill in empty field</label></center></td>
</tr>
<tr class="active">
  <?php
  if(!empty($table_list_rows_3['a_reason'])){
    $view = 'readonly';
  }else{
    $view = '';
  }
  ?>
	<td colspan="5"><textarea <?= $view ?> name="block_reason" rows="5" class="form-control" placeholder="Your reason here ..." required><?php echo $table_list_rows_3[ 'a_reason']; ?></textarea></td>
</tr>


<tr >
  <td colspan="5" style="background:rgb(118, 0, 0); "><center><label style="color: white; font-family: oblique; margin-top: 5px;">TERMINATE RECORD</label></center></td>
</tr>

<tr>

  <td colspan="2"> <center>FIRST OFFENSE REASON</center><textarea class="form-control" disabled><?php echo $table_list_rows_2['a_firstOffense']; ?></textarea></td>
  <td colspan="3"> <center>SECOND OFFENSE REASON</center><textarea class="form-control" disabled><?php echo $table_list_rows_2['a_secondOffense']; ?></textarea></td>
</tr>
<tr>
  <td colspan="5"> <center>THIRD OFFENSE REASON</center><textarea class="form-control" disabled><?php echo $table_list_rows_2['a_thirdOffense']; ?></textarea></td>
</tr>



    </tbody>
  </table>
  </div>
</form>
</div>

<br><br>
  
 </form>
</body>
</html>




<?php 

if (isset($_POST['btn_block'])){
date_default_timezone_get("Asia/Manila");
$id = $_GET['id'];
$dt = date("F d, Y");
$block_reason=$_POST['block_reason'];
  mysql_query("INSERT INTO tbl_block(a_id,a_reason,a_type,a_date) VALUES('$id','$block_reason','Casual','$dt')");
  mysql_query("UPDATE tbl_applicants set a_status = 'block' where a_id = '$id'");
  echo "<script>alert('Successfully Blocked !'); window.location='casual_blockform.php?id=$id'</script>";
}
?>
