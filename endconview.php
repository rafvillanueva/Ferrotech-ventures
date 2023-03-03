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
     <title>End Contract View</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
  </head>
<body>
<style type="text/css">
	p,td,textarea{
		font-family: 'Calibri';
		letter-spacing: 2px;
	}
	li{
		font-family: 'Calibri';
	}

</style>
<nav class="navbar navbar-inverse" style="background-color:gray;border-bottom:4px solid rgb(150, 8, 10);">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;font-family: 'Calibri'">


 	 <a style="text-decoration: none;">
    <a href="endcon_list.php" style="text-decoration: none;">
    <li><span><img src="images/RETURN.png" height="35px"></span> RETURN </li></a>
 	 <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;"><li><span><img src="images/off.png" height="35px"></span> LOG OUT</li></a>
</div>


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
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> Yes</a>
        <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
    </div>
  </div>
</div>
<!--end modal-->



	<?php    
        $table_list_query = mysql_query("SELECT * from tbl_applicants where a_id = '$id'");
        $table_list_rows = mysql_fetch_array($table_list_query);

        $table_list_query_1 = mysql_query("SELECT * from tbl_applicant_field where a_id ='$id'");
		$table_list_rows_1 = mysql_fetch_array($table_list_query_1);

		$table_list_query_2 = mysql_query("SELECT * from tbl_end_contract where a_id ='$id'");
		$table_list_rows_2 = mysql_fetch_array($table_list_query_2);
    ?>
<form method="POST">
  <div class="container" style="margin-left:270px;>
    <div class="container" id="div-id-name" >
		<table class="table table-bordered" style="width:90%;">
 			<thead>
				<tr>
      				<th colspan="6" style="letter-spacing: 6px;">
      			
      						<h3 style=" font-weight: bold; margin-left:3px;"><img src="images/emp_info.jpeg" height="50px" width="50px"> Employee Information </h3>
      				
      				</th>
				</tr>
			</thead>
			<tbody>   

				<tr style="font-family: oblique;">
				
					<td><p style="font-weight:bold;letter-spacing:2px">Idnumber</p><input class="form-control" type="text" name="idnumber" value="<?php echo $table_list_rows['a_id']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Last Name</p><input class="form-control" type="text" value="<?php echo $table_list_rows['a_lname']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">First Name</p><input class="form-control" type="text" readonly name="firstname" value="<?php echo $table_list_rows['a_fname']; ?>" ></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Middle Name</p><input class="form-control" type="text" name="middlename" value="<?php echo $table_list_rows['a_mname']; ?>" readonly></input></td>
						<td><p style="font-weight:bold;letter-spacing:2px">Contact Number</p><input class="form-control" type="text"  name="contactnum" value="<?php echo $table_list_rows['a_contactNumber']; ?>" readonly></input></td>
				</tr>
				<tr style="font-family: oblique;">
				
					<td><p style="font-weight:bold;letter-spacing:2px">Age</p><input class="form-control" type="text" name="age" value="<?php echo $table_list_rows['a_age']; ?>" readonly></input></td>	
					<td><p style="font-weight:bold;letter-spacing:2px">Sex</p><input class="form-control" type="text"  name="sex" value="<?php echo $table_list_rows['a_gender']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Civil Status</p><input class="form-control" type="text" name="status" value="<?php echo $table_list_rows['a_civilStatus']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Birthdate</p><input class="form-control" type="text" name="birthday" value="<?php echo $table_list_rows['a_birthday']; ?>" readonly></input></td>
<td><p style="font-weight:bold;letter-spacing:2px">Position</p><input class="form-control" type="text" name="position" value="<?php echo $table_list_rows['a_position']; ?>" readonly></input></td>	
				</tr>
				<tr style="font-family: oblique;">

					
					<td><p style="font-weight:bold;letter-spacing:2px">Department</p><input class="form-control" type="text" name="department" value="<?php echo $table_list_rows_1['a_department']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Immediate Superior</p><input class="form-control" type="text" name="immediatesuperior" value="<?php echo $table_list_rows_1['a_superior']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Contact Person</p><input class="form-control" type="text" name="contactperson" value="<?php echo $table_list_rows_1['a_contactPerson']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Emergency Number</p><input class="form-control" type="text" name="contactnumber" value="<?php echo $table_list_rows_1['a_contactPersonNum']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Address</p><input class="form-control" type="text" name="address" value="<?php echo $table_list_rows['a_brgy']; ?>" readonly></input></td>
				</tr>
				<tr style="font-family: oblique;">
					
					<td><p style="font-weight:bold;letter-spacing:2px">Date Hired</p><input class="form-control" type="text" name="datehired" value="<?php echo $table_list_rows_1['a_dateHired']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">End Contract</p><input class="form-control" type="text" name="endcon" value="<?php echo $table_list_rows_1['a_dateEnd']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Educational Attainment</p><input class="form-control" type="text"  name="educationalattainment" value="<?php echo $table_list_rows['a_education']; ?>" readonly></input></td>	

					<td colspan="2"><p style="font-weight:bold;letter-spacing:2px">Employee Record</p><textarea class="form-control" type="text"  name="employeerecord" readonly><?php echo $table_list_rows['a_empRecords']; ?></textarea></td>
				</tr>
				<tr style="font-family: oblique;">
					<td><p style="font-weight:bold;letter-spacing:2px">Tax Code</p><input class="form-control" type="text"  name="tax" value="<?php echo $table_list_rows_1['a_tax']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Tin Number</p><input class="form-control" type="text" name="tin" value="<?php echo $table_list_rows_1['a_tin']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Sss Number</p><input class="form-control" type="text" name="sss" value="<?php echo $table_list_rows_1['a_sss']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Philhealth</p><input class="form-control" type="text" name="philhealth" value="<?php echo $table_list_rows_1['a_philHealth']; ?>" readonly></input></td>
					<td><p style="font-weight:bold;letter-spacing:2px">Pag-ibig Number</p><input class="form-control" type="text"  name="pagibig" value="<?php echo $table_list_rows_1['a_pagibin']; ?>" readonly></input></td>
				</tr>
				<tr>
					<td colspan="6" style="letter-spacing:2px; font-weight: bold; color: red; font-family:'Calibri'"> <img src="images/endcon.png" width="50px" height="40px"> End Contract Reason</td>
				</tr>
				<tr>
					<td colspan="6" style="font-family: oblique;">
						<textarea name="endcon_reason" class="form-control" placeholder="Your reason here ..." rows="5" readonly ><?php echo $table_list_rows_2['a_reason'];?></textarea>
					</td>
				</tr>
				</form>
				
		    </tbody>
		</table>
	
	</div>
</div>
<br><br>


<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 

if (isset($_POST['btn_endcon'])){
	$endcon_reason=$_POST['endcon_reason'];
	$verify = mysqli_query($conn, "SELECT * FROM tbl_end_contract WHERE a_id = '$id'");
	$count = mysqli_num_rows($verify);
	if($count == 0){
		mysql_query("INSERT INTO tbl_end_contract VALUES(NULL,'$id','$endcon_reason')");
	}else{
		mysql_query("UPDATE tbl_end_contract SET a_reason = '$endcon_reason' WHERE a_id = '$id'");
	}
	mysql_query("UPDATE tbl_applicants SET a_status = 'endcon' where a_id = '$id'");
	echo "window.location='endcon_list.php'</script>";
}
?>
