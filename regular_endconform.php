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
     <title></title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
 	  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  </head>
<body>

<nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0; padding: 5px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;">
    <a href="regulareval_list.php" style="text-decoration: none;"><li><span style="font-family: 'Calibri'"><img src="images/RETURN.png" height="35px"> &nbsp; RETURN </span></li></a>
     <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;">
    <li><span style="font-family: 'Calibri'"><img src="images/off.png" height="35px"> &nbsp; LOG OUT</span> </li></a>
</a> 
 
</div>
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
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> Yes
        </a>
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
  <div class="container" style="margin-left:240px;">
    <div class="container" id="div-id-name" > 
	
<style type="text/css">
	td{
		font-family: 'Calibri';
		letter-spacing: 2px;
	}
	u{
		color:green;
		text-transform: uppercase; 
		
	}
</style>
		<table class="table table-bordered"  style="width: 93%;">
			<thead> 
				<tr>
      			<th  colspan="6" style="letter-spacing: 2px; background-image: url(images/r.jpg); background-size: cover; background-repeat: no-repeat;">

      						<h3 style="font-family:'Calibri'; letter-spacing: 6px; color: white; font-weight: bold; font-size:20px;"><img src="images/endcon.png" width="40px" height="40px"> REGULAR END CONTRACT FORM</h3>
      				

      				</th>
				</tr>
			</thead>
			<tbody>     
<tr style="font-family: oblique;">
					
					<td>ID Number : <u><?php echo $table_list_rows['a_id']; ?></u></td>
					<td colspan="2">Employee Name : <u><?php echo $table_list_rows['a_lname']; echo" "; echo $table_list_rows['a_fname']; echo " "; echo $table_list_rows['a_mname'];?></u></td>


					<td>Position : <u><?php echo $table_list_rows['a_position']; ?></u></td>
					<td>Department : <u><?php echo $table_list_rows_1['a_department']; ?></u></td>
	
				
				</tr>
				<tr style="font-family: oblique;">
					<td colspan="3">Immediate superior : <u><?php echo $table_list_rows_1['a_superior'];?></u></td>
					<td>Date hired : <u><?php echo $table_list_rows_1['a_dateHired']; ?></u></td>
					<td>End contract : <u><?php echo $table_list_rows_1['a_dateEnd']; ?></u></td>
				</tr>
			
			
			
				<tr>
					<td colspan="6"  style="font-family:'Calibri'; font-weight: bold; color: red; letter-spacing: 3px;" >*Please Enter Reason</td>
				</tr>
				<tr>
					<td colspan="6" style="font-family: oblique;">
						<textarea name="endcon_reason" class="form-control" placeholder="Input reason here.." rows="5" required><?php echo $table_list_rows_2['a_reason'];?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="6" class="active" style="font-family:'Calibri'">
						<button style="letter-spacing: 5px; font-size: 15px;" name="btn_endcon" type="submit" class="btn btn-success" style="font-family:'Calibri'"><span class="glyphicon glyphicon-check"></span>CONFIRM</button>


      					<a style="letter-spacing: 5px; font-size: 15px;" href="regularevaluation.php?id=<?= $id ?>&casual" type="button" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> EVALUATE</a>  
					</td>
				</tr>
		    </tbody>
		</table>
	</form>
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
	echo "<script>alert('Successfully end contract !'); window.location='casualeval_list.php'</script>";
}
?>
