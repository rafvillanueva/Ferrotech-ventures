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
        <h1 class="glyphicon glyphicon- form-control"style="font-size:30px; height:60px;font-weight: bold;"><img src="images/edit_waiting.png" height="40px">EDIT RECORD</h1>
    </center>

  <hr>

  <thead>
    
    <tr>
        <th colspan="4" style="font-family: oblique;font-size:20px;">

          <div style="float:left;">
                <button type="submit" class="btn btn-primary glyphicon glyphicon-check" name="btn_waiting_edit" value="update">UPDATE</button>
              
                <a href="waiting_list.php"><button  class="btn btn-danger glyphicon glyphicon-remove" type="button">Cancel</button></a>
            
               
        </th>
          </div>
    </tr>

  </thead>


<tbody>     
    
    <tr>
       
        <td>Position desire<input type="text" class="form-control" name="positiondesired" value="<?php echo $table_list_rows['positiondesired']; ?>"></input></td>
        
        <td>Date applied<input type="date" class="form-control" name="dateapplied" value="<?php echo $table_list_rows['dateapplied']; ?>"></input></td>
 

    </tr>
      


<tr>
       
        <td>Last name<input type="text" class="form-control" name="lastname" value="<?php echo $table_list_rows['lastname']; ?>"></input></td>
       
        <td>First name<input type="text" class="form-control" name="firstname" value="<?php echo $table_list_rows['firstname']; ?>"></input></td>
       
    
</tr>
      


<tr>
       
        <td>Middle name<input type="text" class="form-control" name="middlename" value="<?php echo $table_list_rows['middlename']; ?>"></input></td>
       
        <td>Contact No.<input type="text" class="form-control" name="contactnum" value="<?php echo $table_list_rows['contactnum']; ?>"></input></td>
       
    
</tr>
        

   
<tr>
      
      <td>Age
                <input type="number" class="form-control" name="age" value="<?php echo $table_list_rows['age']; ?>"></input>
      </td>
      
      <td>Sex
                <input type="text" class="form-control" name="sex" value="<?php echo $table_list_rows['sex']; ?>"></input>
      </td>
      
    

</tr>

   

<tr>
           
        
      <td>Educational attainment
              <input type="text" class="form-control" name="educationalattainment" value="<?php echo $table_list_rows['educationalattainment']; ?>"></input>
      </td>
        
      
      <td>Employee record
                <input type="text" class="form-control" name="employeerecord" value="<?php echo $table_list_rows['employeerecord']; ?>"></input>
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

if (isset($_POST['btn_waiting_edit'])){


$positiondesired=$_POST['positiondesired'];
$dateapplied=$_POST['dateapplied'];
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$contactnum=$_POST['contactnum'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$educationalattainment=$_POST['educationalattainment'];
$employeerecord=$_POST['employeerecord'];




mysql_query("UPDATE table_list set positiondesired='$positiondesired',dateapplied='$dateapplied',lastname='$lastname',firstname='$firstname',middlename='$middlename',contactnum='$contactnum',age='$age',sex='$sex',educationalattainment='$educationalattainment',employeerecord='$employeerecord' where id='$id'");

echo "<script>alert('Successfully updated!'); window.location='waiting_list.php'</script>";


}
?>