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
     <title>Termination Page</title>
     <link rel="stylesheet" href="bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  </head>
<body >

    <nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0;  padding: 5.5px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px; letter-spacing: 1px;">
 <a href="employee_view.php?id=<?= $_GET['id'] ?>&type=<?= $_GET['type'] ?>" style="text-decoration: none;">
    <li>
      <span style="font-family: 'Calibri'">
        <img src="images/return.png" height="35px"> &nbsp; RETURN
      </span>
    </li>
  </a>
 
   <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;">
    <li>
      <span style="font-family: 'Calibri'">
        <img src="images/off.png" height="35px"> &nbsp; LOG OUT
      </span>
    </li>
  </a>
 </div>
  <?php
   $table_list_query = mysql_query("SELECT * from tbl_applicants where a_id ='$id'");
   $table_list_rows = mysql_fetch_array($table_list_query);

   $table_list_query_1 = mysql_query("SELECT * from tbl_applicant_field where a_id ='$id'");
   $table_list_rows_1 = mysql_fetch_array($table_list_query_1);

  $type = $_GET['type'];
  if($type == "Casual"){
    $data = "Casual";
  }elseif($type == "ProjectBased"){
    $data = "Project Based";
  }elseif($type == "Regular") {
    $data = "Regular";
  }

   $table_list_query_2 = mysql_query("SELECT * from tbl_terminate where a_id ='$id' AND a_type = '$data'");
   $table_list_rows_2 = mysql_fetch_array($table_list_query_2);
  ?>
<form method="POST" action="?id=<?= $_GET['id'] ?>&type=<?= $_GET['type'] ?>">
  <div class="container" style="margin-top:-30px;">
    <div class="container" id="div-id-name" ><br>
<h3 style=" letter-spacing: 3px; font-size: 25px; margin-left:200px;" ><img src="images/warning.png" height="45px"><b> Employee Termination </b></h3> 
    <div class="panel panel-default" style="margin-left:170px;">
    <div class="panel-heading">
      <table class="table table-bordered">
        <tbody>     
          <tr style="font-family: 'Calibri'">
            <td class="active" style="letter-spacing: 2px;"><b>Employee Type</b><input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['a_status']; ?>" readonly></input></td>
            <td class="active"  style="letter-spacing: 2px;"><b>Id Number</b><input type="text" class="form-control" name="idnumber" value="<?php echo $table_list_rows['a_id']; ?>" readonly></input></td>
            <td class="active"  style="letter-spacing: 2px;"><b>Fullname</b><input type="text" class="form-control" value="<?php echo $table_list_rows['a_fname'];?>,  <?php echo $table_list_rows['a_mname']; ?> <?php echo $table_list_rows['a_lname']; ?>" readonly></input></td>
            <td class="active"  style="letter-spacing: 2px;"><b>Position</b><input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['a_position']; ?>" readonly></input></td>
            <td class="active"  style="letter-spacing: 2px;"><b>Department</b><input type="text" class="form-control" name="department" value="<?php echo $table_list_rows_1['a_department']; ?>" readonly></input></td>
          </tr>
          <tr>
          	<td colspan="5" style="letter-spacing: 2px;"><h4 style="color:red; font-family:'Calibri'; letter-spacing:2px;">First Offense Reason</h4></td>
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
          	<td colspan="5"><textarea <?= $view ?>  class="form-control" placeholder="Enter First Offense here.." name="casual_foffense"><?php echo $table_list_rows_2['a_firstOffense']; ?></textarea></td>
          </tr>
          <tr>
          	<td colspan="5" style="letter-spacing: 2px;"><h4 style="color:red; font-family:'Calibri'; letter-spacing:2px;">Second Offense Reason</h4></td>
          </tr>
          <tr class="active"> 
          	<td colspan="5"><textarea <?= $view_2 ?>  class="form-control" placeholder="Enter Second Offense here.." name="casual_soffense" ><?php echo $table_list_rows_2['a_secondOffense']; ?></textarea></td>
          </tr>
          <tr>
          	<td colspan="5"style="letter-spacing: 2px;"><h4 style="color:red; font-family:'Calibri'; letter-spacing:2px;">Third Offense Reason</h4></td>
          </tr>
          <tr class="active">
          	<td colspan="5"><textarea <?= $view_3 ?> class="form-control" placeholder="Enter Third Offense here.." name="casual_toffense"><?php echo $table_list_rows_2['a_thirdOffense']; ?></textarea></td>
          </tr>
          <tr class="active">
          	<td colspan="5">
          		<button style="letter-spacing: 5px; font-family: 'Calibri'" type="submit" name="casual_terminate" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>SAVED RECORD</button>
          		
          	</td>
          </tr>
        </tbody>
      </table>
      </div>
           </div>
                </div>
    </div>
  <br><br>
 </form>


 <!--VIEW MODAL IF YOU TRY TO LOG-OUT-->
<div class="modal fade" id="logout">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center>
          <h4 class="modal-title" style="font-family: oblique; color:black;font-weight: bold; letter-spacing: 2px;">VERIFY ACTION</h4>        
        </center>
      </div>
        <div class="modal-body">
        <center>
            <p class="alert alert-danger" style="font-weight:bold; font-family: oblique;" >Are you sure do you want to log-out ?</p>
        </center>
      </div>
        <div class="modal-footer">
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> YES
        </a>
          <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
          </form>
        </div>
      </div>
    </div>
    </div> 
</div>
<!--end modal-->
<!--END SEARCH-->
<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
if (isset($_POST['casual_terminate'])){
  date_default_timezone_get("Asia/Manila");
  $id = $_GET['id'];
  $type = $_GET['type'];
  if($type == "Casual"){
    $data = "Casual";
  }elseif($type == "ProjectBased"){
    $data = "Project Based";
  }elseif($type == "Regular") {
    $data = "Regular";
  }
  $dt = date("F d, Y");
  $casual_foffense = $_POST['casual_foffense'];
  $casual_soffense = $_POST['casual_soffense'];
  $casual_toffense = $_POST['casual_toffense'];
  $rs = mysqli_query($conn, "SELECT * FROM tbl_terminate WHERE a_id = '$id' AND a_type = '$data'");
  if(mysqli_num_rows($rs) == 0){
    mysqli_query($conn, "INSERT INTO tbl_terminate VALUES(NULL,'$id','$casual_foffense','$casual_soffense','$casual_toffense','$data','$dt')");
  }else{
    mysql_query("UPDATE `tbl_terminate` SET a_firstOffense = '$casual_foffense', a_secondOffense = '$casual_soffense', a_thirdOffense = '$casual_toffense', a_date = '$dt' where a_id = '$id'");
  }
  echo "<script>alert('Successfully Saved !'); window.location='a_termination.php?id=$id&type=$type'</script>";
}
?>

