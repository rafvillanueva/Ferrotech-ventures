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
    
         $table_list_query = mysql_query("SELECT * from table_list where id ='$id'");
         $table_list_rows = mysql_fetch_array($table_list_query);
    
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
  <td class="active">EMPLOYEE TYPE<input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['record_status']; ?>"disabled></input></td>
 <td class="active">Id number<input type="text" class="form-control" name="idnumber" value="<?php echo $table_list_rows['idnumber']; ?>" disabled></input></td>


 <td class="active">Full name<input type="text" class="form-control" value="<?php echo $table_list_rows['firstname'];?> <?php echo $table_list_rows['middlename']; ?> <?php echo $table_list_rows['lastname']; ?>" disabled></input></td>


 <td class="active">Position<input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['position']; ?>" disabled></input></td>
 <td class="active">Department<input type="text" class="form-control" name="department" value="<?php echo $table_list_rows['department']; ?>" disabled></input></td>

</tr>
<tr >
	<td colspan="5" style="background-color: #333; "><center><h4 style="color: white; font-family: oblique;">FIRST OFFENSE REASON</h4></center></td>
</tr>
<tr class="active">
	<td colspan="5"><textarea class="form-control" placeholder="Please fill in your reason here ..." name="regular_foffense"><?php echo $table_list_rows['regular_foffense']; ?></textarea></td>
</tr>
<tr>
	<td colspan="5" style="background-color: #333; "><center><h4 style="color: white; font-family: oblique;">SECOND OFFENSE REASON</h4></center></td>
</tr>
<tr class="active"> 
	<td colspan="5"><textarea class="form-control" placeholder="Please fill in your reason here ..." name="regular_soffense" ><?php echo $table_list_rows['regular_soffense']; ?></textarea></td>
</tr>

<tr>
	<td colspan="5" style="background-color: #333; "><center><h4 style="color: white; font-family: oblique;">THIRD OFFENSE REASON</h4></center></td>
</tr>
<tr class="active">
	<td colspan="5"><textarea class="form-control" placeholder="Please fill in your reason here ..." name="regular_toffense"><?php echo $table_list_rows['regular_toffense']; ?></textarea></td>
</tr>

<tr class="active">
	<td colspan="5">
			<button type="submit" name="regular_terminate" class="btn btn-primary btn-lg glyphicon glyphicon-save">Submit</button>
			<a href="reg_emp_list.php" type="button" class="btn btn-danger btn-lg glyphicon glyphicon-remove">Cancel</a>

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

if (isset($_POST['regular_terminate'])){


$regular_foffense=$_POST['regular_foffense'];
$regular_soffense=$_POST['regular_soffense'];
$regular_toffense=$_POST['regular_toffense'];



mysql_query("UPDATE table_list set regular_foffense='$regular_foffense',regular_soffense='$regular_soffense',regular_toffense='$regular_toffense' where id='$id'");
  
  echo "<script>alert('Successfully Saved !'); window.location='reg_emp_list.php'</script>";



}
?>

