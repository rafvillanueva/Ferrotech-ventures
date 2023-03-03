<?php
include 'dbcon.php';
if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  ?>
  <script type="text/javascript">window.location.href = 'casual_list.php'</script>
  <?php
}
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

   $table_list_query_2 = mysql_query("SELECT * from tbl_terminate where a_id ='$id' AND a_type = 'Casual'");
   $table_list_rows_2 = mysql_fetch_array($table_list_query_2);
  ?>
<form method="POST">
  <div class="container">
    <div class="container" id="div-id-name" >
      <table class="table table-bordered ">
        <thead>
        <tr>
          <th colspan="5"><center><h3 style="font-family: oblique; font-weight: bold;"><img src="images/terminate_emp.png" height="50px">TERMINATION FORM</h3></center></th>
        </tr>
        </thead>
        <tbody>     
          <tr>
            <td class="active">EMPLOYEE TYPE<input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['a_status']; ?>" readonly></input></td>
            <td class="active">Id number<input type="text" class="form-control" name="idnumber" value="<?php echo $table_list_rows['a_id']; ?>" disabled></input></td>
            <td class="active">Full name<input type="text" class="form-control" value="<?php echo $table_list_rows['a_lname'];?>,  <?php echo $table_list_rows['a_lname']; ?> <?php echo $table_list_rows['a_mname']; ?>" disabled></input></td>
            <td class="active">Position<input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['a_position']; ?>" disabled></input></td>
            <td class="active">Department<input type="text" class="form-control" name="department" value="<?php echo $table_list_rows_1['a_department']; ?>" disabled></input></td>
          </tr>
          <tr>
          	<td colspan="5" style="background-color: #333; "><center><h4 style="color: white; font-family: oblique;">FIRST OFFENSE REASON</h4></center></td>
          </tr>
          <tr class="active">
            <?php
            if(!empty($table_list_rows_2['a_firstOffense'])){
              $view = 'readonly';
            }else{
              $view = '';
            }

            if(!empty($table_list_rows_2['a_secondOffense'])){
              $view_2 = 'readonly';
            }else{
              $view_2 = '';
            }

            if(!empty($table_list_rows_2['a_thirdOffense'])){
              $view_3 = 'readonly';
            }else{
              $view_3 = '';
            }
            ?>
          	<td colspan="5"><textarea <?= $view ?>  class="form-control" placeholder="Please fill in your reason here ..." name="casual_foffense"><?php echo $table_list_rows_2['a_firstOffense']; ?></textarea></td>
          </tr>
          <tr>
          	<td colspan="5" style="background-color: #333; "><center><h4 style="color: white; font-family: oblique;">SECOND OFFENSE REASON</h4></center></td>
          </tr>
          <tr class="active"> 
          	<td colspan="5"><textarea <?= $view_2 ?>  class="form-control" placeholder="Please fill in your reason here ..." name="casual_soffense" ><?php echo $table_list_rows_2['a_secondOffense']; ?></textarea></td>
          </tr>
          <tr>
          	<td colspan="5" style="background-color: #333; "><center><h4 style="color: white; font-family: oblique;">THIRD OFFENSE REASON</h4></center></td>
          </tr>
          <tr class="active">
          	<td colspan="5"><textarea <?= $view_3 ?> class="form-control" placeholder="Please fill in your reason here ..." name="casual_toffense"><?php echo $table_list_rows_2['a_thirdOffense']; ?></textarea></td>
          </tr>
          <tr class="active">
          	<td colspan="5">
          		<button type="submit" name="casual_terminate" class="btn btn-primary btn-lg glyphicon glyphicon-save">Submit</button>
          		<a href="employee_view.php?id=<?= $_GET['id'] ?>" type="button" class="btn btn-danger btn-lg glyphicon glyphicon-remove">Cancel</a>
          	</td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
  <br><br>
 </form>
</body>
</html>
<?php 
if (isset($_POST['casual_terminate'])){
  date_default_timezone_get("Asia/Manila");
  $id = $_GET['id'];
  $dt = date("F d, Y");
  $casual_foffense = $_POST['casual_foffense'];
  $casual_soffense = $_POST['casual_soffense'];
  $casual_toffense = $_POST['casual_toffense'];
  $rs = mysqli_query($conn, "SELECT * FROM tbl_terminate WHERE a_id = '$id'");
  if(mysqli_num_rows($rs) == 0){
    mysqli_query($conn, "INSERT INTO tbl_terminate VALUES(NULL,'$id','$casual_foffense','$casual_soffense','$casual_toffense','Casual','$dt')");
  }else{
    mysql_query("UPDATE `tbl_terminate` SET a_firstOffense = '$casual_foffense', a_secondOffense = '$casual_soffense', a_thirdOffense = '$casual_toffense', a_date = '$dt' where a_id = '$id'");
  }
  echo "<script>alert('Successfully Saved !'); window.location='casual_termination.php?id=$id'</script>";
}
?>

