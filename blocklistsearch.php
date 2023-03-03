<?php
include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Blocklist Employee</title>
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
      <span><img src="images/block_icon.png" height="40px"></span> Blocked Employee List
  
  </h2>


<form  style="margin-right:73px;" method="POST" action="blocklistsearch.php" class="navbar-search pull-right">
                    
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
                                        <th style="width:8px;"><center>Reason</center></th>
                                        <th><center>Lastname</center></th>
                                        <th><center>Firstname</center></th>
                                        <th><center>Middlename</center></th>
                                        <th><center>Birthdate</center></th>
		</tr>

</thead>
                                    <?php
                                    if (isset($_POST['search'])){
                                    
                                        $search=$_POST['search'];                                     
                                        $query=mysql_query("SELECT * from table_list where (firstname like '%$search%' or lastname like '%$search%' or middlename like '%$search%') AND record_status = 'block'")or die(mysql_error());
                                        while($row=mysql_fetch_array($query)){
                                        $id=$row['id'];
                                        ?>

        <tr>
              <td>
                      <center><a href="blockview_reason.php<?php echo '?id='.$row['id']; ?>" class="btn btn-primary glyphicon glyphicon-eye-open btn-md" data-toggle="tooltip" data-placement="top" title="View"></a></center>
              </td>
                                         
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['middlename']; ?></td>
                                            <td><?php echo $row['birthday']; ?></td>

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