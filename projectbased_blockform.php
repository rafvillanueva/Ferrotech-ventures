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

  <div class="container">
    <div class="container" id="div-id-name" >
<form method="POST">
<table class="table table-bordered ">
 

<thead>
<tr>
      <th colspan="5">     
      <div style="margin-top: 5px;">  
              <button type="submit" name="btn_block" class="btn btn-primary btn-md glyphicon glyphicon-check">Confirm</button>   
              <a href="projectbased_list.php" type="button" class="btn btn-danger btn-md glyphicon glyphicon-remove">Cancel</a>
      </div>

              <center><h3 style="font-family: oblique; font-weight: bold; margin-top: -25px;"><img src="images/blocklist.jpg" height="45px">BLOCK EMPLOYEE</h3></center>
      </th>
</tr>


</thead>

<tbody>     
<tr>
  <td class="active">EMPLOYEE TYPE<input type="text" class="form-control" name="record_status" value="<?php echo $table_list_rows['record_status']; ?>" disabled></input></td>

 <td class="active">Id number<input type="text" class="form-control"  name="idnumber" value="<?php echo $table_list_rows['idnumber']; ?>" disabled></input></td>

 <td class="active">Full name<input type="text" class="form-control" value="<?php echo $table_list_rows['firstname'];?> <?php echo $table_list_rows['middlename']; ?> <?php echo $table_list_rows['lastname']; ?>" disabled></input></td>

 <td class="active">Position<input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['position']; ?>" disabled></input></td>

 <td class="active">Department<input type="text" class="form-control" name="department" value="<?php echo $table_list_rows['department']; ?>" disabled></input></td>

</tr>
<tr >
	<td colspan="5" style="background:rgb(118, 0, 0); "><center><label style="color: white; font-family: oblique; margin-top: 5px;">Please fill in empty field</label></center></td>
</tr>

<tr class="active">
	<td colspan="5"><textarea name="block_reason" rows="5" class="form-control" placeholder="Your reason here ..." required><?php echo $table_list_rows[ 'block_reason']; ?></textarea></td>
</tr>


<tr >
  <td colspan="5" style="background:rgb(118, 0, 0); "><center><label style="color: white; font-family: oblique; margin-top: 5px;">TERMINATE RECORD</label></center></td>
</tr>

<tr>

  <td colspan="2"> <center>FIRST OFFENSE REASON</center><textarea class="form-control" disabled><?php echo $table_list_rows['projectbased_foffense']; ?></textarea></td>
  <td colspan="3"> <center>SECOND OFFENSE REASON</center><textarea class="form-control" disabled><?php echo $table_list_rows['projectbased_soffense']; ?></textarea></td>
</tr>
<tr>
  <td colspan="5"> <center>THIRD OFFENSE REASON</center><textarea class="form-control" disabled><?php echo $table_list_rows['projectbased_toffense']; ?></textarea></td>
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


$block_reason=$_POST['block_reason'];


mysql_query("UPDATE table_list set block_reason ='$block_reason' where id='$id'");
mysql_query("UPDATE table_list set record_status = 'block' where id='$id'");
  
  echo "<script>alert('Successfully Blocked !'); window.location='projectbased_list.php'</script>";



}
?>
