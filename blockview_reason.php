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
     <title>Blocked Employee</title>
     <link rel="stylesheet" href="bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="css/sidebar.css">


  </head>

<body>
  <nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0; padding: 5.3px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px; letter-spacing: 1px;">
 <a href="blocklist.php" style="text-decoration: none;">
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

   $table_list_query_2 = mysql_query("SELECT * from tbl_terminate where a_id ='$id' AND a_type = '$data'");
   $table_list_rows_2 = mysql_fetch_array($table_list_query_2);

  

  ?>


  <div class="container-fluid">
    <div class="container" id="div-id-name" >
        <h3 style="font-family: oblique;  font-weight: bold; letter-spacing: 4px; margin-left:200px;"><span><img src="images/blocklist.jpeg" height="45px"></span>  Blocked Employee Info</h3>

      </center>



    <div class="panel panel-default" style="margin-left:170px;">
    <div class="panel-heading">
<table class="table table-bordered ">



<tbody>     
 <tr>
            <td class="active"><b>Employee Type</b><input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['a_status']; ?>" readonly></input></td>

            <td class="active"><b>Id Number</b><input type="text" class="form-control" name="idnumber" value="<?php echo $table_list_rows['a_id']; ?>" disabled></input></td>

            <td class="active"><b>Fulname</b><input type="text" class="form-control" value="<?php echo $table_list_rows['a_lname'];?>,  <?php echo $table_list_rows['a_fname']; ?> <?php echo $table_list_rows['a_mname']; ?>" disabled></input></td>

            <td class="active"><b>Position</b><input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['a_position']; ?>" disabled></input></td>

            <td class="active"><b>Department</b><input type="text" class="form-control" name="department" value="<?php echo $table_list_rows_1['a_department']; ?>" disabled></input></td>
          </tr>

<?php

   $table_list_query = mysql_query("SELECT * from tbl_applicants where a_id ='$id'");
   $table_list_rows = mysql_fetch_array($table_list_query);

   $table_list_query_1 = mysql_query("SELECT * from tbl_applicant_field where a_id ='$id'");
   $table_list_rows_1 = mysql_fetch_array($table_list_query_1);

  $table_list_query_2 = mysql_query("SELECT * from tbl_block where a_id ='$id'");
   $table_list_rows_2 = mysql_fetch_array($table_list_query_2);

?>


<tr >
	<td colspan="5"><label style="color: red; letter-spacing: 3px; font-family:'Calibri'; margin-top: 5px; margin-left: 5%;" >*Reason to be blocked</label></td>
</tr>
<tr class="active">
	<td colspan="5"><textarea rows="5" class="form-control" disabled><?php echo $table_list_rows_2['a_reason']; ?></textarea></td>
</tr>
<?php

   $table_list_query = mysql_query("SELECT * from tbl_applicants where a_id ='$id'");
   $table_list_rows = mysql_fetch_array($table_list_query);

   $table_list_query_1 = mysql_query("SELECT * from tbl_applicant_field where a_id ='$id'");
   $table_list_rows_1 = mysql_fetch_array($table_list_query_1);

  $table_list_query_2 = mysql_query("SELECT * from tbl_terminate where a_id ='$id'");
   $table_list_rows_2 = mysql_fetch_array($table_list_query_2);

?>



<tr >
  <td colspan="5"><label style="color:green; letter-spacing: 3px; font-family:'Calibri'; margin-top: 5px; margin-left: 5%;" >*Terminate Record</label></td>
</tr>


  <td colspan="2" style="letter-spacing:2px; color:red;"> <center>First Offense Reason</center><textarea <?= $view ?>  class="form-control"  name="casual_foffense" disabled><?php echo $table_list_rows_2['a_firstOffense']; ?></textarea></td>


  <td colspan="3" style="letter-spacing:2px; color:red;"> <center>Second Offense Reason</center><textarea class="form-control" disabled><?php echo $table_list_rows_2['a_secondOffense']; ?></textarea></td>

<tr>
  <td colspan="5" style="letter-spacing:2px; color:red;"> <center>Third Offense Reason</center><textarea class="form-control" disabled><?php echo $table_list_rows_2['a_thirdOffense']; ?></textarea></td>
</tr>

<tr>

  

    </tbody>
  </table>
  </div>
</div>  </div>
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
