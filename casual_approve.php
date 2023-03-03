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
     <link rel="stylesheet" href="bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />

  </head>

<body style="background-color: rgb(222, 234, 198);">

    <?php 
    
         $table_list_query = mysql_query("SELECT * from table_list where id ='$id'");
         $table_list_rows = mysql_fetch_array($table_list_query);
    
    ?>




<form method="POST">
  <div class="container">
  <div class="container" id="div-id-name" >

  <table class="table table-bordered ">
    
    <center>

        <h1 class="glyphicon glyphicon- form-control"style="font-size:30px;height:60px; font-weight: bold;"><img style="margin-left:-2%;" src="images/applicant_approve.jpg" height="40px">Approved Applicant</h1>
    </center>
  
  <hr>

  <thead>
    
    <tr>
        <th colspan="4" style="font-family: oblique;font-size:20px;">

          <div style="float:left;">

                <button type="submit" class="btn btn-md btn btn-success glyphicon glyphicon-save" name="btn_casual_appprove" value="update">SAVE</button>


              
                <a href="waiting_list.php"><button  class="btn btn-danger glyphicon glyphicon-remove" type="button">CANCEL</button></a>
            
                <label style="position:center; margin-left: 290px;">Please Fill in emplty fields</label>
        </th>
          </div>
    </tr>

  </thead>


<tbody>     
    
    <tr>
       
        <td>Id No.<input type="number" class="form-control" name="idnumber" value="<?php echo $table_list_rows['idnumber']; ?>"required></input></td>
        
        <td>Last name<input type="text" class="form-control" name="lastname" value="<?php echo $table_list_rows['lastname']; ?>"required></input></td>

        <td>First name<input type="text" class="form-control" name="firstname" value="<?php echo $table_list_rows['firstname']; ?>"required></input></td>

        <td>Middle name<input type="text" class="form-control" name="middlename" value="<?php echo $table_list_rows['middlename']; ?>"required></input></td>
 

    </tr>
      


<tr>
       
        <td>Contact No.<input type="number" class="form-control" name="contactnum" value="<?php echo $table_list_rows['contactnum']; ?>"required></input></td>
       
        <td>Age<input type="number" class="form-control" name="age" value="<?php echo $table_list_rows['age']; ?>"required></input></td>

        <td>Sex<input type="text" class="form-control" name="sex" value="<?php echo $table_list_rows['sex']; ?>"required></input></td>

        <td>Status<select name="status" class="form-control" required="">
                      <option value="">----------</option>
                      <option value="Single">Single</option>
                       <option value="Married">Married</option>
                    </select></td>
       
    
</tr>
      


<tr>
       
        <td>Birthdate<input type="date" class="form-control" name="birthday" value="<?php echo $table_list_rows['birthday']; ?>"required></input></td>
       
        <td>Position<input type="text" class="form-control" name="position" value="<?php echo $table_list_rows['position']; ?>"required></input></td>
        

        <td>Immediate superior<input type="text" class="form-control" name="immediatesuperior" value="<?php echo $table_list_rows['immediatesuperior']; ?>"required></input></td>

        <td>Department<select name="department" class="form-control" required>
                      <option value="">----------</option>
                      <option value="Logistics">Logistics</option>
                      <option value="Qca">Qca</option>
                      <option value="Production">Production</option>
                      <option value="Admin">Admin</option>
                      <option value="Warehouse">Warehouse</option>
                    </select></td>
    
</tr>
        

   
<tr>
      
      <td>Contact person
                <input type="text" class="form-control" name="contactperson" value="<?php echo $table_list_rows['contactperson']; ?>"required></input>
      </td>
      
      <td>Contact Number
                <input type="number" class="form-control" name="contactnumber" value="<?php echo $table_list_rows['contactnumber']; ?>"required></input>
      </td>
      

      <td>Address<input type="text" class="form-control" name="address" value="<?php echo $table_list_rows['address']; ?>"required></input></td>
      

    <td>Date hired
              <input type="date" class="form-control" name="datehired" value="<?php echo $table_list_rows['datehired']; ?>"required></input>
      </td>

</tr>

   

<tr>
           
            
      <td>End contract
                <input type="date" class="form-control" name="endcon" value="<?php echo $table_list_rows['endcon']; ?>"required></input>
      </td>

      <td>Educational attainment<input type="text" class="form-control" name="educationalattainment" value="<?php echo $table_list_rows['educationalattainment']; ?>"required></input></td>


      <td>Employee record<input type="text" class="form-control" name="employeerecord" value="<?php echo $table_list_rows['employeerecord']; ?>"required></input></td>

        <td>Tax code<input type="text" class="form-control" name="tax" value="<?php echo $table_list_rows['tax']; ?>"></input></td>

</tr>

<tr>
  
      <td>Tin number<input type="text" class="form-control" name="tin" value="<?php echo $table_list_rows['tin']; ?>"></input></td>

      <td>Sss number<input type="text" class="form-control" name="sss" value="<?php echo $table_list_rows['sss']; ?>"></input></td>

        <td>Philhealth<input type="text" class="form-control" name="philhealth" value="<?php echo $table_list_rows['philhealth']; ?>"></input></td>

          <td>Pag&nbspibig&nbspnumber<input type="text" class="form-control" name="pagibig" value="<?php echo $table_list_rows['pagibig']; ?>"></input></td>

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
if (isset($_POST['btn_casual_appprove'])){


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
$immediatesuperior=$_POST['immediatesuperior'];
$contactperson=$_POST['contactperson'];
$contactnumber=$_POST['contactnumber'];
$address=$_POST['address'];
$datehired=$_POST['datehired'];
$endcon=$_POST['endcon'];
$educationalattainment=$_POST['educationalattainment'];
$employeerecord=$_POST['employeerecord'];
$tax=$_POST['tax'];
$tin=$_POST['tin'];
$sss=$_POST['sss'];
$philhealth=$_POST['philhealth'];
$pagibig=$_POST['pagibig'];





mysql_query("UPDATE table_list set idnumber='$idnumber',lastname='$lastname',firstname='$firstname',middlename='$middlename',contactnum='$contactnum',age='$age',sex='$sex',status='$status',birthday='$birthday',position='$position',department='$department',immediatesuperior='$immediatesuperior',contactperson='$contactperson',contactnumber='$contactnumber',address='$address',datehired='$datehired',endcon='$endcon',educationalattainment='$educationalattainment',employeerecord='$employeerecord',tax='$tax',tin='$tin',sss='$sss',philhealth='$philhealth',pagibig='$pagibig' where id='$id'");
  
mysql_query("UPDATE table_list set record_status = 'casual' where id='$id'");


echo "<script>alert('Successfully approved!'); window.location='waiting_list.php'</script>";


}
?>