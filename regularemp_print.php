<?php
include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Regular Employee</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" type="text/css" href="css/sidebar.css">
     <style type="text/css">
       .body{font-family: 'Corbel';}
     </style>
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0; padding: 5px;">
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
    <label class="dropbtn"><span><img src="images/ratings-icon-5.jpg" height="35px"></span> &nbsp; RATINGS</label>
    <div class="dropdown-content" style="font-family: 'Calibri'; font-size: 13px;">
      <a href="analysis&reporting.php">Casual Employee</a>
      <a href="projectbasedemp_print.php">Project Based Employee</a>
      <a href="regularemp_print.php">Regular Employee</a>
    </div>
  </li>
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
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> Yes
        </a>
          <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>
<!--end modal-->
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">   
<div class="pull-left1">
  <h2 style="font-weight:bold; font-family: 'Corbel'; color:rgb(150, 8, 10); letter-spacing: 2px;"> 
    <span><img src="images/casuallist.jpg" height="40px"></span> Regular Employee List
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
      <button class="btn btn-info" type="submit" name="search_rage" style="font-size: 13px;">Search Range</button>
      <b> :: </b>
      <input type="text" name="search_v" class="search-query form-control" placeholder="Search employee...">
      <button class="btn btn-info" type="submit" name="search_val" style="font-size: 13px;">Search</button><br><br>
      <button class="btn btn-success" type="submit" name="search_valuated" style="font-size: 13px; margin-left: 40px;">Show All Evaluated Employees</button>
      <button class="btn btn-danger" type="submit" name="search_not_valuated" style="font-size: 13px;">Show All Not Evaluated Employees</button>
      <button class="btn btn-warning" type="submit" name="search_all" style="font-size: 13px;">Show All Employees</button>
      <?php
      if(isset($_POST['search_rage'])){
          $val = $_POST['search_v'];
          if(empty($val)){
            $fromz = date_create($_POST['rage_from']);
            $toz = date_create($_POST['rage_to']);
            $depz = $_POST['department'];
            
            $l_from = date_format($fromz, "Y-m-d");
            $l_to = date_format($toz, "Y-m-d");

            $from = $_POST['rage_from'];
            $to = $_POST['rage_to'];
            $dep = $_POST['department'];

            if(empty($from) || empty($to)){
              $dd = "Department: " . $dep;
              $link = "Regulareval_print/?department=" . $dep;
            }elseif($dep == "-- DEPARTMENT --"){
              $dd = "From " . $from . " - To: " . $to;
              $link = "Regulareval_print/?zfrom=" . $l_from . "&zto=" . $l_to;
            }else{
              $dd = "From " . $from . " - To: " . $to;
              $link = "Regulareval_print/?from=" . $l_from . "&to=" . $l_to . "&zdepartment=" . $dep;
            }
          }else{
            $dd = "Result";
            $link = "Regulareval_print/?value=" . $val;
          }
        }elseif(isset($_POST['search_val'])){
          $val = $_POST['search_v'];     
          $dd = "Result";
          $link = "Regulareval_print/?value=" . $val;
        }elseif(isset($_POST['search_valuated'])){
          $dd = "All Evaluated";
          $link = "Regulareval_print/?type=all";
        }elseif(isset($_POST['search_not_valuated'])){
          $dd = "All Not Evaluated";
          $link = "Regulareval_print/?type=not";
        }elseif(isset($_POST['search_all'])){
          $val = $_POST['search_val'];     
          $dd = "Result: All Employees";
          $link = "Regulareval_print/?keyword=all";
        }else{
         $val = $_POST['search_v'];     
         $dd = "Result";
         $link = "Regulareval_print/?value=" . $val;
        }
      ?>
      <a href="<?= $link ?>" target="_blank" class="btn btn-primary" type="submit" name="search_valz" style="font-size: 13px; width: 35%; margin-left: 4px;margin-left:65%; margin-top: -5%;">Print Report ( <b><i><?= $dd ?></i></b> )</a>
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
<div class="panel panel-default">
  <div class="panel-heading">
    Reports of Regular Employee.
    
    <!-- <a href="<?= $link ?>" target="_blank" class="btn btn-xs btn-success pull-right">Print Report</a> -->
    <br>
  </div>
  <div class="panel-body">
    <table class="table table-hover" >
      <thead>
        <tr class="active" style="font-weight: bold; font-size: 13px;">
          <th width="100">Employee ID</th>
          <th>Applicant name <small>(Last Name, First Name, Middle Name )</small></th>
          <th>Gender</th>
          <th>Civil Status</th>
          <th>Age</th>
          <th>Position</th>
          <th>Department</th>
          <th>Ratings</th>
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
            }elseif($dep == "-- DEPARTMENT --"){
              $sql = "SELECT * FROM tbl_applicant_field WHERE a_dateHired <= '$to' AND a_dateEnd >= '$from'";
              $query = mysql_query($sql)or die(mysql_error());
            }else{
              $sql = "SELECT * FROM tbl_applicant_field WHERE a_dateHired <= '$to' AND a_dateEnd >= '$from' AND a_department = '$dep'";
              $query = mysql_query($sql)or die(mysql_error());
            }

          }else{
            $query = mysql_query("SELECT * from tbl_applicants WHERE a_status = 'Regular' AND (a_id LIKE '%$val%' OR a_lname LIKE '%$val%' OR a_fname LIKE '%$val%' OR a_mname LIKE '%$val%')")or die(mysql_error());
          }
        }elseif(isset($_POST['search_val'])){        
          $val = $_POST['search_v'];
          $query = mysql_query("SELECT * from tbl_applicants WHERE a_status = 'Regular' AND (a_id LIKE '%$val%' OR a_lname LIKE '%$val%' OR a_fname LIKE '%$val%' OR a_mname LIKE '%$val%') AND a_status = 'Regular'")or die(mysql_error());
        }elseif(isset($_POST['search_valuated'])){
          $query = mysql_query("SELECT * from tbl_ratings WHERE a_type = 'Regular' AND a_rate NOT LIKE ''")or die(mysql_error());
        }elseif(isset($_POST['search_not_valuated'])){
          $query = mysql_query("SELECT * from tbl_applicants where a_status = 'Regular' ORDER BY ID DESC")or die(mysql_error());
        }elseif(isset($_POST['search_all'])){          
          $query = mysql_query("SELECT * from tbl_applicants where a_status = 'Regular' ORDER BY ID DESC")or die(mysql_error());
        }else{
          $query = mysql_query("SELECT * from tbl_applicants where a_status = 'Regular' ORDER BY ID DESC")or die(mysql_error());
        }

          $num = 1;
          if(mysql_num_rows($query) == 0){
          ?>
          <center><h2><b><i style="color: red">"NO RECOND FOUND"</i></b></h2></center>
          <hr>
          <?php
        }else{
          while($rowz=mysql_fetch_array($query)){
            $id = $rowz['a_id'];
            $info = mysql_query("SELECT * from tbl_applicants where a_id = '$id' AND `tbl_applicants`.a_status = 'Regular' ORDER BY ID DESC")or die(mysql_error());
            $row = mysql_fetch_array($info);

            $field = mysqli_query($conn, "SELECT * FROM tbl_applicant_field WHERE a_id = '$id'");
            $row_field = mysqli_fetch_array($field);

            $rate = mysqli_query($conn, "SELECT * FROM tbl_ratings WHERE a_id = '$id'");
            $row_rate = mysqli_fetch_array($rate);

            if(!empty($row['a_lname'])){
              if(isset($_POST['search_not_valuated'])){
                $cc = mysql_query("SELECT * from tbl_ratings WHERE a_type = 'Regular' AND a_id = '$id'")or die(mysql_error());
                if(mysql_num_rows($cc) == 0){
                   ?>
                    <tr style="text-transform: uppercase; font-size: 13px;">
                      <td><?= $row['a_id'] ?></td>
                      <td><?php echo $row['a_lname'] . ", " . $row['a_fname'] . " " . $row['a_mname']; ?></td>
                      <td><?php echo $row['a_gender']; ?></td>
                      <td><?php echo $row['a_civilStatus']; ?></td>
                      <td><?php echo $row['a_age']; ?></td>
                      <td><?php echo $row['a_position']; ?></td>
                      <td><?php echo $row_field['a_department']; ?></td>
                      <td><?php echo $row_rate['a_rate']; ?>%</td>
                    </tr>
                    <?php
                    $num++;

                    }
                  }else{
                     ?>
                    <tr style="text-transform: uppercase; font-size: 13px;">
                      <td><?= $row['a_id'] ?></td>
                      <td><?php echo $row['a_lname'] . ", " . $row['a_fname'] . " " . $row['a_mname']; ?></td>
                      <td><?php echo $row['a_gender']; ?></td>
                      <td><?php echo $row['a_civilStatus']; ?></td>
                      <td><?php echo $row['a_age']; ?></td>
                      <td><?php echo $row['a_position']; ?></td>
                      <td><?php echo $row_field['a_department']; ?></td>
                      <td><?php echo $row_rate['a_rate']; ?>%</td>
                    </tr>
                    <?php
                    $num++;
                    }
                  }
       
        }
        }                         
        ?>
      </tbody>
      </table>    
  </div>
</div>
</div>
<!--END SEARCH-->
<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>