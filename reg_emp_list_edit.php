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
     <link rel="stylesheet" type="text/css" href="css/waitingextra.css">

  </head>

<body style="background-color:rgb(222, 234, 198);">

<?php 
  $table_list_query = mysql_query("SELECT * from table_list where id ='$id'");
  $table_list_rows = mysql_fetch_array($table_list_query);
?>

<form method="POST">
  <div class="container">
    <div class="container" id="div-id-name" >

<table class="table table-bordered ">
    
  <center>
      <h1 class="glyphicon glyphicon- form-control" style="font-size:30px; height:60px; color:black;font-weight: bold;"><img src="images/edit_emp.png" height="40px">EDIT EMPLOYEE RECORD</h1>
  </center>
  <hr>

<thead>
<tr>
        <th colspan="4" style="font-family: oblique;font-size:20px;">

          <div style="float:left;">
                <button type="submit" class="btn btn-primary glyphicon glyphicon-check" name="btn_employee_edit" value="update">UPDATE</button>
<a href="reg_emp_list.php"><button  class="btn btn-danger glyphicon glyphicon-remove" type="button">Cancel</button></a>
           
        </th>
          </div>

</tr>
</thead>

<tbody>     
<tr>
       
        <td>Id number<input type="number" class="form-control" name="idnumber" value="<?php echo $table_list_rows['idnumber']; ?>"></input></td>
        
        <td>Last name<input type="text" class="form-control" name="lastname" value="<?php echo $table_list_rows['lastname'];  ?>"></input></td>
   
        <td>First name<input type="text" class="form-control" name="firstname" value="<?php echo $table_list_rows['firstname'];  ?>" ></input></td>

        <td>Middle name<input type="text" class="form-control" name="middlename" value="<?php echo $table_list_rows['middlename'];  ?>"></input></td>

</tr>
      

<tr>    
        
        <td>Contact No.<input type="number" class="form-control" name="contactnum" value="<?php echo $table_list_rows['age'];?>"></input></td>
        
           <td>Age<input type="number" class="form-control" name="age" value="<?php echo $table_list_rows['age'];?>"></input></td>
        


   <td>Sex<input type="text" class="form-control" name="sex" value="<?php echo $table_list_rows['sex'];?>"></input></td>
        

        

        <td>Status<input type="text" class="form-control" name="status" value="<?php echo $table_list_rows['status'];?>"></input></td>
        

        
</tr>

<tr>
       
        <td>Birthdate<input type="date" class="form-control"  name="birthday" value="<?php echo $table_list_rows['birthday'];  ?>"></input></td>
       
        <td>Position<input type="text" class="form-control" name= "position" value="<?php echo $table_list_rows['position']; ?>"></input></td>
       

    <td>Department<input type="text" class="form-control" name="department" value="<?php echo $table_list_rows['department'];?>"></input></td>
        

        

        <td>Supervisor<input type="text" class="form-control" name="supervisor" value="<?php echo $table_list_rows['supervisor'];  ?>"></input></td>

</tr>
        
   
<tr>
        
        <td>Contact person<input type="text" class="form-control" name="contactperson" value="<?php echo $table_list_rows['contactperson'];  ?>"></input></td>  

        <td>Contact number<input type="number" class="form-control" name="contactnumber" value="<?php echo $table_list_rows['contactnumber'];  ?>"></input></td>

                <td>Address<input type="text" class="form-control" name="address" value="<?php echo $table_list_rows['address'];  ?>"></input></td>

        
        <td>Date hired<input type="date" class="form-control" name="datehired" value="<?php echo $table_list_rows['datehired'];  ?>"></input></td>
</tr>

   

<tr>
        
        <td>Date regular<input type="date" class="form-control" name="dateregular" value="<?php echo $table_list_rows['dateregular'];  ?>"></input></td>      
        
        <td>Educational attainment<input type="text" class="form-control" name="educationalattainment" value="<?php echo $table_list_rows['educationalattainment'];  ?>"></input></td>
        
        <td>Employee record<input type="text" class="form-control" name="employeerecord" value="<?php echo $table_list_rows['employeerecord'];  ?>"></input></td>

        <td>Tax Code<input type="text" class="form-control" name="tax" value="<?php echo $table_list_rows['tax'];  ?>"></input></td>
</tr>


<tr>
        
        <td>Tin No.<input type="text" class="form-control" name="tin" value="<?php echo $table_list_rows['tin'];  ?>"></input></td>      
        
        <td>SSS No.<input type="text" class="form-control" name="sss" value="<?php echo $table_list_rows['sss'];?>"></input></td>
        
        <td>Philhealth <input type="text" class="form-control" name="philhealth" value="<?php echo $table_list_rows['philhealth'];  ?>"></input></td>

        <td>Pag-ibig No.<input type="text" class="form-control"  name="pagibig" value="<?php echo $table_list_rows['pagibig'];  ?>"></input></td>
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

if (isset($_POST['btn_employee_edit'])){


$idnumber=$_POST['idnumber'];
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$contactnum=$_POST['contactnum'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$status=$_POST['status'];
$birthday=$_POST['birthday'];
$position=$_POST['position'];
$department=$_POST['department'];
$supervisor=$_POST['supervisor'];
$contactperson=$_POST['contactperson'];
$contactnumber=$_POST['contactnumber'];
$address=$_POST['address'];
$datehired=$_POST['datehired'];
$dateregular=$_POST['dateregular'];
$educationalattainment=$_POST['educationalattainment'];
$employeerecord=$_POST['employeerecord'];
$tax=$_POST['tax'];
$tin=$_POST['tin'];
$sss=$_POST['sss'];
$philhealth=$_POST['philhealth'];
$pagibig=$_POST['pagibig'];


mysql_query("UPDATE table_list set idnumber='$idnumber',lastname='$lastname',firstname='$firstname',middlename='$middlename',contactnum='$contactnum',age='$age',sex='$sex',status='$status',birthday='$birthday',position='$position',department='$department',supervisor='$supervisor',contactperson='$contactperson',contactnumber='$contactnumber',address='$address',datehired='$datehired',dateregular='$dateregular',educationalattainment='$educationalattainment',employeerecord='$employeerecord',tax='$tax',tin='$tin',sss='$sss',philhealth='$philhealth',pagibig='$pagibig' where id='$id'");

echo "<script>alert('Successfully updated!'); window.location='reg_emp_list.php'</script>";



}
?>