<?php
include('dbcon.php');
?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Casual Evaluation</title>
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
      <a href="casualeval_list.php">Casual employee</a>
      <a href="projectbasedeval_list.php">Projectbased employee</a>
      <a href="regulareval_list.php">Regular employee</a>
    </div>
  </li>

  <a href="endcon_list.php" style="text-decoration: none;"><li><span><img src="images/endcon_icon.png" height="35px"></span> End Contract</li></a>


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
      <span class="glyphicon glyphicon-th-list"></span> Casual Employee Ratings
  
  </h2>


<form  style="margin-right:73px;" method="POST" action="casualevalsearch.php" class="navbar-search pull-right">
                    
                    <input style="margin-top:-25%;" type="text" name="search" class="search-query form-control glyphicon glyphicon-search" placeholder="Search employee..." required>
</form>  
<span ><img style="margin-left:76%; margin-top:-6%;" src="images/search_icon.png" height="45px"></span>


<!--SEARCH TABLE-->
<?php
    include('dbcon.php');
?> 
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">         


<table class="table table-hover table-striped" border="1" cellpadding="10px">
<thead>
  




    <tr  class="active" style="font-weight: bold;">
    <th colspan="3" style="width: 10%;"><center>Action</center></th>
      <th><center>Id&nbspnumber</center></th>
      <th><center>Last&nbspname</center></th>
      <th><center>First&nbspname</center></th>
      <th><center>Middle&nbspname</center></th>
      <th><center>Position</center></th>
      <th><center>Department</center></th>
      <th><center>Date&nbspend&nbspContract</center></th>
      <th><center>Ratings</center></th>
    </tr>

</thead>
    <?php
                                    if (isset($_POST['search'])){
                                    
                                        $search=$_POST['search'];                                     
                                        $query=mysql_query("SELECT * from table_list where (idnumber like '%$search%' or firstname like '%$search%' or lastname like '%$search%' or middlename like '%$search%') AND record_status = 'casual'")or die(mysql_error());
                                        while($row=mysql_fetch_array($query)){
                                        $id=$row['id'];
                                        ?>

 <tr>
          <td><center><a href="casual_promote.php<?php echo '?id='.$row['id']; ?>" style="text-decoration: none; height: 35px;" class=" glyphicon glyphicon-ok-circle btn-success btn btn-md" >Promote</a></center></td>


      <td><center><a  href="casualevaluation.php<?php echo '?id='.$row['id']; ?>" class="glyphicon glyphicon-edit edit_btn  btn-primary btn btn-md">Evaluate</a></center></td>

<td>
    <center><a href="casual_endconform.php<?php echo '?id='.$row['id']; ?>" style="text-decoration: none; margin-top: 2px;" class=" glyphicon glyphicon-remove-circle edit_btn  btn-danger btn btn-md">EndCon</a>
</center> 
</td>
                                         
  <td><?php echo $row['idnumber'] ; ?></td>
  <td><?php echo $row['lastname'] ; ?></td>
  <td><?php echo $row['firstname'] ; ?></td>
  <td><?php echo $row['middlename'] ; ?></td>
  <td><?php echo $row['position'] ; ?></td>
  <td><?php echo $row['department'] ; ?></td>
  <td><?php echo $row['endcon'] ; ?></td>
  <td><?php echo $row['ratingscasual'] ; ?></td>

        </tr>
    <?php
    }
        }
                                    
    ?>


</table>
    
</div>


  <!--END SEARCH-->



<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>




</body>
</html>