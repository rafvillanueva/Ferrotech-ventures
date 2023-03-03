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

  </head>


<body style="background-color:rgb(222, 234, 198);font-weight: bold;">


 	<?php 
    
         $table_list_query = mysql_query("SELECT * from table_list where id ='$id'");
         $table_list_rows = mysql_fetch_array($table_list_query);
    
    ?>



  <div class="container">
    <div class="container" id="div-id-name" >

<table class="table table-bordered" style="border-color: black;">
 

<thead>
<tr>
<form method="POST">
    <th style="background:rgb(118, 0, 0);" colspan="6">

     		<button name="btn_promote" type="submit" class="btn btn-primary" style="font-family: oblique;"><span class="glyphicon glyphicon-check"></span>Confirm</button> 

      		<a href="casualeval_list.php" type="button" class="btn btn-danger" style="font-family: oblique;"><span class="glyphicon glyphicon-remove"></span>CANCEL</a> 
			
			<center><h3 style="font-family: oblique; color:white; margin-top: -30px;">PROMOTION</h3></center>

	</th>

</tr>
</thead>
<tbody>     
<tr style="font-family: oblique;">
	<td>EMPLOYEE TYPE<input class="form-control" type="text" name="record_status" value="<?php echo $table_list_rows['record_status']; ?>" disabled></input></td>


	<td style="font-family: oblique;">Evaluation ratings<input class="form-control" name="ratingscasual" value="<?php echo $table_list_rows['ratingscasual']; ?>"  disabled></input></td>


	<td>Idnumber<input class="form-control" type="text" name="idnumber" value="<?php echo $table_list_rows['idnumber']; ?>" disabled></input></td>
	<td>Last name<input class="form-control" type="text" value="<?php echo $table_list_rows['lastname']; ?>" disabled></input></td>
	<td colspan="2">First name<input class="form-control" type="text"disabled name="firstname" value="<?php echo $table_list_rows['firstname']; ?>" ></input></td>



</tr>

<tr style="font-family: oblique;">

	<td>Middle name<input class="form-control" type="text" name="middlename" value="<?php echo $table_list_rows['middlename']; ?>" disabled></input></td>
	<td>Contact number<input class="form-control" type="text"  name="contactnum" value="<?php echo $table_list_rows['contactnum']; ?>" disabled></input></td>
	<td>Age<input class="form-control" type="text" name="age" value="<?php echo $table_list_rows['age']; ?>" disabled></input></td>	
	<td>Sex<input class="form-control" type="text"  name="sex" value="<?php echo $table_list_rows['sex']; ?>" disabled></input></td>
	<td colspan="2">Status<input class="form-control" type="text" name="status" value="<?php echo $table_list_rows['status']; ?>" disabled></input></td>




</tr>

<tr style="font-family: oblique;">
	<td>Birthdate<input class="form-control" type="text" name="birthday" value="<?php echo $table_list_rows['birthday']; ?>" disabled></input></td>
	<td>Position<input class="form-control" type="text" name="position" value="<?php echo $table_list_rows['position']; ?>" disabled></input></td>	
	<td>Department<input class="form-control" type="text" name="department" value="<?php echo $table_list_rows['department']; ?>" disabled></input></td>
	<td>Immediate superior<input class="form-control" type="text" name="immediatesuperior" value="<?php echo $table_list_rows['immediatesuperior']; ?>" disabled></input></td>
	<td colspan="2">Contact person<input class="form-control" type="text" name="contactperson" value="<?php echo $table_list_rows['contactperson']; ?>" disabled></input></td>


</tr>

<tr style="font-family: oblique;">

	<td>Emergency number<input class="form-control" type="text" name="contactnumber" value="<?php echo $table_list_rows['contactnumber']; ?>" disabled></input></td>
	<td>Address<input class="form-control" type="text" name="address" value="<?php echo $table_list_rows['address']; ?>" disabled></input></td>
	<td>Date hired<input class="form-control" type="text" name="datehired" value="<?php echo $table_list_rows['datehired']; ?>" disabled></input></td>

	<td>End contract<input class="form-control" type="date" name="endconprojectbased" value="<?php echo $table_list_rows['endconprojectbased']; ?>" required></input></td>

	<td colspan="2">Educational attainment<input class="form-control" type="text"  name="educationalattainment" value="<?php echo $table_list_rows['educationalattainment']; ?>" disabled></input></td>	

</tr>

<tr style="font-family: oblique;">

	<td>Employee record<input class="form-control" type="text"  name="employeerecord" value="<?php echo $table_list_rows['employeerecord']; ?>" disabled></input></td>
	<td>Tax code<input class="form-control" type="text"  name="tax" value="<?php echo $table_list_rows['tax']; ?>" disabled></input></td>
	<td>Tin number<input class="form-control" type="text" name="tin" value="<?php echo $table_list_rows['tin']; ?>" disabled></input></td>
	<td>Sss number<input class="form-control" type="text" name="sss" value="<?php echo $table_list_rows['sss']; ?>" disabled></input></td>
	<td>Philhealth<input class="form-control" type="text" name="philhealth" value="<?php echo $table_list_rows['philhealth']; ?>" disabled></input></td>
	<td>Pag-ibig number<input class="form-control" type="text"  name="pagibig" value="<?php echo $table_list_rows['pagibig']; ?>" disabled></input></td>

</tr>

<tr>
	<td style="font-family:oblique;background:rgb(118, 0, 0); color: white;" colspan="6"><center>TERMINATION RECORD</center></td>
</tr>
<tr style="background-color: #333;">
	<td colspan="2" style="font-family: oblique; color: white;"><center>FIRST OFFENSE</center></td>
	<td colspan="2" style="font-family: oblique; color: white;"><center>SECOND OFFENSE</center></td>
	<td colspan="2" style="font-family: oblique; color: white;"><center>THIRD OFFENSE</center></td>
</tr>
<tr>
	<td colspan="2" style="font-family: oblique;">Reason<textarea class="form-control"disabled><?php echo $table_list_rows['casual_foffense'];?></textarea></td>
	<td colspan="2" style="font-family: oblique;">Reason<textarea class="form-control" name="casual_soffense"disabled><?php echo $table_list_rows['casual_soffense']; ?></textarea></td>
    <td colspan="2" style="font-family: oblique;">Reason<textarea class="form-control" name="casual_toffense" disabled><?php echo $table_list_rows['casual_toffense']; ?></textarea></td>
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

if (isset($_POST['btn_promote'])){


$endconprojectbased=$_POST['endconprojectbased'];
mysql_query("UPDATE table_list set endconprojectbased='$endconprojectbased'where id='$id'");
mysql_query("UPDATE table_list set record_status = 'projectbased' where id='$id'");


echo "<script>alert('Successfully promoted!'); window.location='casualeval_list.php'</script>";


}
?>


