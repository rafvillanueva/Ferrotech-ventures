<?php
include('dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Recruiting applicant tracking</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" type="text/css" href="css/sidebar.css">
     <style type="text/css">
       .body{font-family: 'Corbel';}
     </style>
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
          <h4 class="modal-title" style="font-family: oblique; color:black;font-weight: bold;">VERIFY ACTION</h4>        
        </center>
      </div>
        <div class="modal-body">
        <center>
            <p class="alert alert-danger" style="font-weight:bold; font-family: oblique;" >Are you sure do you want to log-out ?</p>
        </center>
      </div>
        <div class="modal-footer">
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary"><span class=" glyphicon glyphicon-check"></span> YES
        </a>
          <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>
<!--end modal-->
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">   
<div class="pull-left1">
  <h2 style="font-weight:bold; font-family: 'Corbel'; color:rgb(150, 8, 10);"> 
    <span><img src="images/casuallist.jpg" height="40px"></span> <b style="letter-spacing: 3px; font-size:20px;">Project Based Employee List</b>
  </h2>
</div>
<hr>
<form method="POST" class="form-inline" class="navbar-search" style="font-size: 10px;">
  <div class="pull-rSight">
    <div class="form-group">
      <?php
      if(isset($_POST['search_rage'])){
        $from = $_POST['rage_from'];
        $to = $_POST['rage_to'];
        $dep = $_POST['department'];
      }else{
        $from = "";
        $to = "";
        $dep = "";
      }
      ?>
     <b>FROM :</b>
     <input type="date" name="rage_from" value="<?= $from ?>" class="search-query form-control form-horizontal" placeholder="Search employee...">
     <b>TO :</b>
     <input type="date" name="rage_to" value="<?= $to ?>" class="search-query form-control form-horizontal" placeholder="Search employee...">
     <select class="form-control" name="department">
      <?php
      if(isset($_POST['search_rage'])){
        ?>
        <option><?= $dep ?></option>
        <?php
      }
      ?>
       <option>-- DEPARTMENT --</option>
       <option>QCA</option>
       <option>Logistics</option>
       <option>Production</option>
       <option>Warehouse</option>
       <option>Administrator</option>
     </select>
      <button class="btn btn-primary" type="submit" name="search_rage" style="font-size: 13px;">Search Range</button>
      <b> :: </b>
      <input type="text" name="search_v" class="search-query form-control" placeholder="Search employee...">
      <button class="btn btn-primary" type="submit" name="search_val" style="font-size: 13px;"><span class="glyphicon glyphicon-search"></span> Search</button>
      <!-- <span><img src="images/search_icon.png" height="45px"></span> -->
    </div>
  </div>
</form>
<hr>
</div>
<!--SEARCH TABLE-->
<?php
    include('dbcon.php');
?> 
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">         
<table class="table table-hover table-bordered" cellpadding="10px">
  <thead>
    <tr class="active" style="font-weight: bold; font-size: 13px;">
      <th width="100">Employee ID</th>
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
      if(isset($_POST['search_rage'])){
        $val = $_POST['search_v'];
        if(empty($val)){
          $from = $_POST['rage_from'];
          $to = $_POST['rage_to'];
          $dep = $_POST['department'];
          if(empty($from) || empty($to)){
            $sql = "SELECT * FROM tbl_applicant_field WHERE a_department = '$dep'";
            $query = mysql_query($sql)or die(mysql_error());
          }elseif(empty($dep)){
            $sql = "SELECT * FROM tbl_applicant_field WHERE a_dateHired <= '$to' AND a_dateEnd >= '$from'";
            $query = mysql_query($sql)or die(mysql_error());
          }else{
            $sql = "SELECT * FROM tbl_applicant_field WHERE a_dateHired <= '$to' AND a_dateEnd >= '$from' AND a_department = '$dep'";
            $query = mysql_query($sql)or die(mysql_error());
          }
        }else{
          $query = mysql_query("SELECT * from tbl_applicants WHERE a_status = 'Project Based' AND (a_id LIKE '%$val%' OR a_lname LIKE '%$val%' OR a_fname LIKE '%$val%' OR a_mname LIKE '%$val%')")or die(mysql_error());
        }
      }elseif(isset($_POST['search_val'])){        
        $val = $_POST['search_v'];
        $query = mysql_query("SELECT * from tbl_applicants WHERE a_status = 'Project Based' AND (a_id LIKE '%$val%' OR a_lname LIKE '%$val%' OR a_fname LIKE '%$val%' OR a_mname LIKE '%$val%')")or die(mysql_error());
      }else{      
        $query = mysql_query("SELECT * from tbl_applicants where a_status = 'Project Based' ORDER BY ID DESC")or die(mysql_error());
      }

      $num = 1;
      if(mysql_num_rows($query) == 0){
        ?>
         <center><h2><b><p style="color:red; letter-spacing: 3px; font-size: 25px;"><img src="images/Mazenl77-NX11-Folder-Default.ico" height="40px;" width="50px;">NO RECORD FOUND</p></b></h2></center>
        <hr>
        <?php
      }else{
      while($rowz=mysql_fetch_array($query)){
        $id = $rowz['a_id'];
        $info = mysql_query("SELECT * from tbl_applicants where a_id = '$id' AND a_status = 'Project Based' ORDER BY ID DESC")or die(mysql_error());
        $row = mysql_fetch_array($info)
    ?>
    <tr style="text-transform: uppercase; font-size: 13px;">
      <td><?= $row['a_id'] ?></td>
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
      <td><center><a href="employee_view.php?id=<?= $row['a_id'] ?>&type=ProjectBased" class="btn btn-xs btn-success">View</a></center></td>
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