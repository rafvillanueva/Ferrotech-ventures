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
     <link rel="stylesheet" type="text/css" href="css/sidebar.css">

  </head>

<body>
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

     $table_list_query_3 = mysql_query("SELECT * from tbl_block where a_id ='$id' AND a_type = '$data' ORDER BY ID DESC");
     $table_list_rows_3 = mysql_fetch_array($table_list_query_3); 
    ?>

  <div class="container" style="margin-top:-30px;">
    <div class="container" id="div-id-name" >
<form method="POST">

      <br>
        <h3 style="font-family: oblique;  font-weight: bold; letter-spacing: 4px; margin-left:200px;"><img src="images/blocklist.jpeg" height="50px"> Blocking Employee..</h3>
        
<br>
    <div class="panel panel-default"  style="margin-left:170px;">
    <div class="panel-heading">

      

<table class="table table-bordered ">

<tbody>     
<tr>
  <td class="active"><b>Employee Type</b><input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['a_status']; ?>" readonly></input></td>
 <td class="active"><b>Id Number</b><input type="text" class="form-control"  name="idnumber" value="<?php echo $table_list_rows['a_id']; ?>" readonly></input></td>
 <td class="active"><b>Full Name</b><input type="text" class="form-control" value="<?php echo $table_list_rows['a_lname'];?> , <?php echo $table_list_rows['a_fname']; ?> <?php echo $table_list_rows['a_mname']; ?>" readonly></input></td>
 <td class="active"><b>Position</b><input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['a_position']; ?>" readonly></input></td>
 <td class="active"><b>Department</b><input type="text" class="form-control" name="department" value="<?php echo $table_list_rows_1['a_department']; ?>" readonly></input></td>

</tr>
<tr >
	<td colspan="5" style="letter-spacing:2px;"><label style="font-family:'Calibri'; margin-top: 5px; color:red; ">*Employee Block Reason</label></td>
</tr>
<tr class="active">
  <?php
  if(!empty($table_list_rows_3['a_reason'])){
    $view = 'readonly';
  }else{
    $view = '';
  }
  ?>
	<td colspan="5"><textarea <?= $view ?> name="block_reason" rows="5" class="form-control" placeholder="Enter your reason here.." required><?php echo $table_list_rows_3[ 'a_reason']; ?></textarea></td>
</tr>


<tr >
  <td colspan="5" style="letter-spacing: 3px;"><label style="color:red; font-family: oblique; margin-top: 5px;">*Terminate Record</label></td>
</tr>

<tr>

  <td colspan="2"> <center>FIRST OFFENSE REASON</center><textarea class="form-control" readonly><?php echo $table_list_rows_2['a_firstOffense']; ?></textarea></td>
  <td colspan="3"> <center>SECOND OFFENSE REASON</center><textarea class="form-control" readonly><?php echo $table_list_rows_2['a_secondOffense']; ?></textarea></td>
</tr>
<tr>
  <td colspan="5"> <center>THIRD OFFENSE REASON</center><textarea class="form-control" readonly><?php echo $table_list_rows_2['a_thirdOffense']; ?></textarea></td>
</tr>
<tr >
  <td colspan="5">
          <button type="submit" name="btn_block" class="btn btn-success " style="letter-spacing: 5px;"><span class="glyphicon glyphicon-check"></span>CONFIRM </button>   
             
  </td>

</tr>


    </tbody>
  </table>
  </div>
</div>
</div>
</form>
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

if (isset($_POST['btn_block'])){
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
$block_reason=$_POST['block_reason'];
  mysql_query("INSERT INTO tbl_block(a_id,a_reason,a_type,a_date) VALUES('$id','$block_reason','$data','$dt')");
  mysql_query("UPDATE tbl_applicants set a_status = 'block' where a_id = '$id'");
  echo "<script>alert('Employee Successfully Blocked !'); window.location='casual_list.php?id=$id&type=$type'</script>";
}
?>
