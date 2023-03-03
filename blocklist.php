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
<nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0;  padding: 5.5px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
 <div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px; letter-spacing: 1px;">
 <a href="home.php" style="text-decoration: none;">
    <li>
      <span style="font-family: 'Calibri'">
        <img src="images/icons8-home-96.png" height="35px"> &nbsp; HOME
      </span>
    </li>
  </a>
  <li class="dropdown" style="font-family: 'Calibri'">
    <label class="dropbtn"><span><img src="images/icons8-user-folder-96.png" height="35px"></span> &nbsp; EMPLOYEE LIST</label>
    <div class="dropdown-content" style="font-family: 'Calibri'; font-size: 13px;">
      <a href="casual_list.php">Casual Employee</a>
      <a href="projectbased_list.php">Project Based Employee</a>
      <a href="reg_emp_list.php">Regular Employee</a>
    </div>
  </li>
  <a href="waiting_list.php" style="text-decoration: none; ">
    <li>
      <span style="font-family: 'Calibri'">
        <img src="images/icons8-downloads-folder-96.png" height="35px"> &nbsp; WAITING LIST
      </span>
    </li>
  </a>
  <a href="blocklist.php" style="text-decoration: none;">
    <li>
      <span style="font-family: 'Calibri'">
        <img src="images/icons8-porn-folder-96.png" height="35px"> &nbsp; BLOCK LIST
      </span>
    </li>
  </a>
   <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;">
    <li>
      <span style="font-family: 'Calibri'">
        <img src="images/off.png" height="35px"> &nbsp; LOG OUT
      </span>
    </li>
  </a>
 </div>
<!--VIEW MODAL IF YOU TRY TO LOG-OUT-->
<div class="modal fade" id="logout">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center>
          <h4 class="modal-title" style="font-family: oblique; color:black;font-weight: bold; letter-spacing: 2px;">VERIFY ACTION</h4>        
        </center>
      </div>
        <div class="modal-body">
        <center>
            <p class="alert alert-danger" style="font-weight:bold; font-family: oblique;" >Are you sure do you want to log-out ?</p>
        </center>
      </div>
        <div class="modal-footer">
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> YES
        </a>
          <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
          </form>
        </div>
      </div>
    </div>
    </div> 
</div>
<!--end modal-->









<div class="table-responsive container-fluid col-xs-6 col-md-6 col-lg-6" style="margin-left:18px; margin-top: -15px; width: 1060px;">
  
  <table class="table table-hover table-bordered table table-striped" cellpadding="10px" style="margin-top:0px;">
    


<thead>
<tr>
<br>


<th colspan="8" style="font-weight: bold; background-image: url(images/r.jpg); background-repeat: no-repeat; background-size: cover; color:white; font-size:20px; "> <img src="images/blocklist.png" height="50px" width="50px"><b style="letter-spacing: 2px; font-size: 20px; letter-spacing:2px;"> Blocked Employee List</b>
<div class="form-inline navbar-right">




<form method="POST"  style="margin-right:9px; margin-top: 10px;">


 <input type="text" name="search_v" class="search-query form-control" placeholder="Search applicant.." required>
      <button class="btn btn-primary" type="submit" name="search_val" style="font-size: 13px; margin-right: 4px;"><span class="glyphicon glyphicon-search"></span> Search</button>

</div>     
</form>
</th>
</tr>
</thead>

  <thead>
    <tr class="active" style="font-weight: bold; font-size: 13px;">
      <th width="20">#</th>
      <th>Applicant name <small>(Last Name, First Name, Middle Name )</small></th>
      <th>Gender</th>
      <th>Civil Status</th>
      <th>Age</th>
      <th>Contact No.</th>
      <th>Address</th>                                
      <th><center>Action</center></th>                                
    </tr>
  </thead>
  <tbody>
    <?php
      $num = 1;
      if(isset($_POST['search_val'])){
        $val = $_POST['search_v'];
        $query=mysql_query("SELECT * from tbl_applicants where a_status = 'block' AND (a_fname like '%$val%' OR a_lname like '%$val%' OR a_mname like '%$val%' OR a_position like '%$val%') ORDER BY ID DESC")or die(mysql_error());
      }else{
        $query=mysql_query("SELECT * from tbl_applicants where a_status = 'block' ORDER BY ID DESC")or die(mysql_error());
      }
      if(mysql_num_rows($query) == 0){
        ?>
       <tr>
        <td colspan="8"><center><h2><b><p style="color:red; letter-spacing: 3px; font-size: 25px;"><img src="images/Mazenl77-NX11-Folder-Default.ico" height="40px;" width="50px;">NO RECORD FOUND</p></b></h2></center></td>
        </tr>
     
        <?php
      }else{
      while($row=mysql_fetch_array($query)){
    ?>
    <tr style="text-transform: uppercase; font-size: 13px;">
      <td><?= $num ?>.</td>
      <td><?php echo $row['a_lname'] . ", " . $row['a_fname'] . " " . $row['a_mname']; ?></td>
      <td><?php echo $row['a_gender']; ?></td>
      <td><?php echo $row['a_civilStatus']; ?></td>
      <td><?php echo $row['a_age']; ?></td>
      <td><?php echo $row['a_contactNumber']; ?></td>
      <?php
        $prov = $row['a_provine'];
        $city = $row['a_city'];
        $brgy = $row['a_brgy'];
        $provine = mysql_query("SELECT * from refprovince where provCode = '$prov'")or die(mysql_error());
        $citymun = mysql_query("SELECT * from refcitymun where citymunCode = '$city'")or die(mysql_error());
        $prov_row = mysql_fetch_array($provine);
        $city_row = mysql_fetch_array($citymun);
        
      ?>
      <td><?php echo $city_row['citymunDesc']; ?></td>
   <td><center><a href="blockview_reason.php?id=<?= $row['a_id'] ?>&type=Block" class="btn btn-xs btn-success">View</a></center></td>
    </tr>
    <?php
    $num++;
    }
    }                          
    ?>
  </tbody>
  </table>    



</div>
<!--END SEARCH-->
<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>