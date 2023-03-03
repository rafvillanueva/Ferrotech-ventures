<?php
include('dbcon.php');
?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Waiting Applicant</title>
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
    <label class="dropbtn"><span><img src="images/employeelist.jpg" height="35px"></span> EMPLOYEE LIST</label>
    <div class="dropdown-content">
      <a href="casual_list.php">Casual employee</a>
      <a href="projectbased_list.php">Projectbased employee</a>
      <a href="reg_emp_list.php">Regular employee</a>
    </div>
  </li>
 	 <a href="waiting_list.php" style="text-decoration: none;"><li><span><img src="images/waitinglist.jpg" height="35px"></span> WAITING LIST</li></a>
 	 <a href="blocklist.php" style="text-decoration: none;"><li><span><img src="images/blocklist.jpg" height="35px"></span> BLOCK LIST</li></a>
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

  <h2 style="font-weight:bold; font-family:oblique; color:rgb(150, 8, 10); margin-left: 22%; margin-top:2%;">
      <span><img src="images/waitinglist_icon.jpg" height="40px"></span> Applicant List
  </h2>

    <button style="margin-left:48%; margin-top: -5.6%;"class="btn btn-primary glyphicon glyphicon-plus" data-toggle="modal" data-target="#addapp">&nbspADD APPLICANT</button>



      <form style="margin-right:73px;" method="POST" action="waitinglistsearch.php" class="navbar-search pull-right">
                             

                                <input style="margin-top:-25%;" type="text" name="search" class="search-query form-control glyphicon glyphicon-search" placeholder="Search applicant..." required>
      </form>  

<span ><img style="margin-left:76%; margin-top:-9%;" src="images/search_icon.png" height="45px"></span>


<!--SEARCH TABLE-->
<?php
    include('dbcon.php');
?> 
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px; margin-top: -20px; width: 1050px;">					




<table class="table table-hover table-striped" border="1" cellpadding="10px">
<thead>
	


		<tr  class="active" style="font-weight: bold;">
	                                       <th colspan="2"><center>Action</center></th>
                                        <th><center>Postion&nbspdesired</center></th>
                                        <th><center>Dateapplied</center></th>
                                        <th><center>Lastname</center></th>
                                        <th><center>Firstname</center></th>
                                        <th><center>Middlename</center></th>
                                        <th><center>Contact&nbspnumber</center></th>
                                        <th><center>Age</center></th>
                                        <th><center>Sex</center></th>
                                        <th><center>Educational&nbspattainment</center></th>
                                        <th><center>Employee&nbsprecord</center></th>
                                        
		</tr>

</thead>
 <?php
                                    if (isset($_POST['search'])){
                                    
                                        $search=$_POST['search'];                                     
                                        $query=mysql_query("SELECT * from table_list where (positiondesired like '%$search%' or firstname like '%$search%' or lastname like '%$search%' or middlename like '%$search%') AND record_status = ''")or die(mysql_error());
                                        while($row=mysql_fetch_array($query)){
                                        $id=$row['id'];
                                        ?>


        <tr>


<td>
        <a href="casual_approve.php<?php echo '?id='.$row['id']; ?>"  style="text-decoration: none; height: 35px;"  class="  glyphicon glyphicon-ok-circle btn-primary btn btn-md" >Approve</a>

</td>


<td>
        <a style="text-decoration: none; height: 35px;" class=" glyphicon glyphicon-edit edit_btn  btn-warning btn btn-md" href="waitinglist_edit_emp.php <?php echo '?id='.$row['id']; ?>">Edit</a>
</td>
                                         
                                            <td><?php echo $row['positiondesired']; ?></td>
                                            <td><?php echo $row['dateapplied']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['middlename']; ?></td>
                                            <td><?php echo $row['contactnum']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                            <td><?php echo $row['sex']; ?></td>
                                            <td><?php echo $row['educationalattainment']; ?></td>
                                            <td><?php echo $row['employeerecord']; ?></td>

        </tr>
    <?php
    }
        }
                                    
    ?>


</table>
		
</div>


  <!--END SEARCH-->


<!--VIEW MODAL TO ADD APPLICANT-->
<div class="modal fade" id="addapp">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            <center>
             <img src="images/add_applicant.jpg" height="42px">
              <h3 class="modal-title" style="font-family: oblique; font-weight:bold;">APPLICANT DATA</h3>        
            </center>

      </div> 

        <div class="modal-body">
          
<!--MODAL CONTENT-->
    <form method="POST" action="waitinglist_add_emp.php">
      <!--content no.1-->
          <div class="container col-md-6 col-sm-6">

                  <div class="label-group form-horizontal">
                      <label >Postion desired</label>
                      <input type="text" class="form-control"  placeholder="Enter Position desire" name="positiondesired" required>
                  </div>
            
            </div>

      <!--content no.2-->
            <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Date applied</label>
                      <input type="date" class="form-control"  placeholder="Enter Date applied" name="dateapplied" required>
                  </div>
            </div>
 
      <!--content no.3-->
            <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Last name</label>
                      <input type="text" class="form-control"  placeholder="Enter LASTname" name="lastname" required>
                  </div>
            </div>

     <!--content no.4-->
            <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>First name</label>
                    <input type="text" class="form-control"  placeholder="Enter FIRSTname" name="firstname" required>
                      
                  </div>
            </div>
 

    <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Middle name</label>
                    <input type="text" class="form-control"  placeholder="Enter MIDDLEname" name="middlename"required>
                      
                  </div>
    </div>


    <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Contact No.</label>
                    <input type="number" class="form-control"  placeholder="Enter Contact No." name="contactnum"required>
                      
                  </div>
    </div>
 

 
     <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Age</label>
                    <input type="number" class="form-control"  placeholder="Enter Age" name="age" required>
                      
                  </div>
    </div>
 


     <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Sex</label>
                    <select name="sex" class="form-control" required>
                    <option value="">----------</option>
                      <option value="Male">Male</option>
                       <option value="Female">Female</option>
                    </select>
                      
                  </div>
    </div>
 


    <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                     <label>Educational attainment</label>
                     <select name="educationalattainment" class="form-control" required="">
                      <option value="">----------</option>
                      <option value="Elementary graduate">Elementary graduate</option>
                      <option value="Highschool graduate">Highschool graduate</option>
                      <option value="Vocational graduate">Vocational graduate</option>
                       <option value="College graduate">College graduate</option>
                    </select>
                      
                  </div>
    </div>




    <div class="container col-md-6 col-sm-6">  
              
                  <div class="label-group form-horizontal">
                      <label>Employee record</label>
                    <input type="text" class="form-control"  placeholder="Enter employee record" name="employeerecord" required>
                      
                  </div>
    </div>



          <label></label>
      </div>      


       
        <div class="modal-footer">
          <button type="submit" name="btn_waiting_add" class="btn btn-success glyphicon glyphicon-save">Save</button>
          <button type="button" class="btn btn-danger glyphicon glyphicon-remove" data-dismiss="modal">Close</button>

  </form>
        </div>
      </div>
    </div>
    </div>
</div>

<!--end modal-->




<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>




</body>
</html>