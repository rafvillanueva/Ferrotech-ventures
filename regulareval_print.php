<?php
include('dbcon.php');
?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Report</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color:rgb(255, 237, 0);border-bottom:4px solid rgb(150, 8, 10);">
  <div class="container-fluid">
 <img style="margin-left: -1%;" src="images/logo.png" width="300px" height="70px">
   
  

  </div>
</nav>


 <div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;">
 <a href="home.php" style="text-decoration: none;"><li><span><img src="images/home_icon.jpg" height="35px"></span> HOME</li></a>

  <li class="dropdown">
    <label class="dropbtn"><span><img src="images/view_icon.png" height="35px"></span> EMPLOYEE LIST</label>
    <div class="dropdown-content">
      <a href="analysis&reporting.php">Casual employee</a>
      <a href="projectbasedemp_print.php">Projectbased employee</a>
      <a href="regularemp_print.php">Regular employee</a>
    </div>
  </li>

  <li class="dropdown">
    <label class="dropbtn"><span><img src="images/evaluation_icon.png" height="35px"></span> RATINGS</label>
    <div class="dropdown-content">
      <a href="casualeval_print.php">Casual ratings</a>
      <a href="projectbasedeval_print.php">Projectbased ratings</a>
      <a href="regulareval_print.php">Regular ratings</a>
    </div>
  </li>



 	
   <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;"><li><span><img src="images/off.jpg" height="35px"></span> LOG OUT</li></a>


 </div>




<!--VIEW MODAL IF YOU TRY TO LOG-OUT-->


<div class="modal fade" id="logout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            <center>
              <h4 class="modal-title" style="font-family: oblique; color:black;font-weight: bold;">VERIFY ACTION</h4>        
            </center>

      </div> 

        <div class="modal-body">
        <center>
            <p class="alert alert-danger" style="font-weight:bold; font-family: oblique;" >Are you sure do you want to log-out ?</p>
        </center>

         
      </div>      

        <div class="modal-footer">
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary glyphicon glyphicon-check">Yes
        </a>
          <button type="button" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal">No</button>

          </form>
        </div>
      </div>
    </div>
    </div>
</div>

<!--end modal-->

<div style="float:right; margin-right: 20px;">
<a href="regulareval_print" class="btn btn-primary"><span class=" glyphicon glyphicon-share" style="margin-right: 2px; margin-top:1px;"></span>REPORT</a>
</div>

   <h2 style="font-weight:bold; font-family:oblique; color:rgb(150, 8, 10); margin-left: 22%; margin-top:2%;"> 
      <span><img src="images/casuallist.jpg" height="40px"></span> Regular Ratings
  
  </h2>




<!--SEARCH TABLE-->
<?php
    include('dbcon.php');
?> 
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">					


<table class="table table-hover table-striped" border="1" cellpadding="10px">
<thead>
	




		<tr  class="active" style="font-weight: bold;">
              
              <th><center>Id&nbspnumber</center></th>
              <th><center>Last&nbspname</center></th>
              <th><center>First&nbspname</center></th>
              <th><center>Middle&nbspname</center></th>
              <th><center>Position</center></th>
              <th><center>Department</center></th>
              <th><center>Ratings</center></th>
		</tr>

</thead>
<?php
    $table_list_query=mysql_query("SELECT * from table_list where record_status ='regular'");
    while($table_list_rows=mysql_fetch_array($table_list_query)){
?> 
        <tr>
                                         

  <td><?php echo $table_list_rows['idnumber'] ; ?></td>
  <td><?php echo $table_list_rows['lastname'] ; ?></td>
  <td><?php echo $table_list_rows['firstname'] ; ?></td>
  <td><?php echo $table_list_rows['middlename'] ; ?></td>
  <td><?php echo $table_list_rows['position'] ; ?></td>
  <td><?php echo $table_list_rows['department'] ; ?></td>
  <td><?php echo $table_list_rows['ratingsregular'] ; ?></td>

        </tr>
    <?php
    
        }
                                    
    ?>


</table>
		
</div>


  <!--END SEARCH-->




<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>





</body>
</html>