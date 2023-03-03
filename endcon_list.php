<?php
include('dbcon.php');
?>
<!DOCTYPE html>
<html> 
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>End Contract</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0; padding: 5px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;">
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
    <a href="casualeval_list.php">Casual Employee</a>
    <a href="projectbasedeval_list.php">Project Based Employee</a>
    <a href="regulareval_list.php">Regular Employee</a>
  </div>
</li>
<a href="endcon_list.php" style="text-decoration: none;">
  <li>
    <span style="font-family: 'Calibri'">
      <img src="images/icons8-burn-folder-96.png" height="35px"> &nbsp; END CONTRACT
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
      </div>
    </div>
  </div>
</div>
<!--end modal-->


<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">   



</div>
<!--SEARCH TABLE-->
<?php
    include('dbcon.php');
?> 
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">         
  <table class="table table-hover table-bordered" cellpadding="10px">

<thead>
<tr>
<br>


<th colspan="8" style="font-weight: bold; background-image: url(images/r.jpg); background-repeat: no-repeat; background-size: cover; color:white; font-size:20px; "> <img src="images/endcon.png" height="50px" width="50px"><b style="letter-spacing: 2px; font-size: 20px; letter-spacing:2px;"> End Contract Employee Ratings</b>
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
      <th width="100">Employee ID</th>
      <th>Applicant name [ <l style="color:red; font-family: 'Calibri'; letter-spacing:2px;">Lastname,Firstname,Middlename</l> ]</th>
      <th>Position</th>
      <th>Department</th>
      <th>Date Hired</th>
      <th>Date End Contract</th>
      <th><center>Action</center></th>  
    </tr>
  </thead>
  <?php
    if(isset($_POST['search_val'])){
      $val = $_POST['search_v'];
      $query = mysql_query("SELECT * from tbl_applicants where a_status = 'endcon' AND (a_lname like '%$val%' OR a_fname like '%$val%' OR a_mname like '%$val%' OR a_id like '%$val%')")or die(mysql_error());
    }else{
      $query = mysql_query("SELECT * from tbl_applicants where a_status = 'endcon'")or die(mysql_error());
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


    <?php
      $id = $row['a_id'];
      $info = mysql_query("SELECT * from tbl_applicant_field where a_id = '$id' ORDER BY ID DESC")or die(mysql_error());
      $rowz = mysql_fetch_array($info)
  ?>




  <tr style="text-transform: uppercase; font-size: 13px;">
    <td><?php echo $row['a_id'] ; ?></td>
    <td><?php echo $row['a_lname'] . ", " . $row['a_fname'] . " " . $row['a_mname']; ?></td>
    <td><?php echo $row['a_position'] ; ?></td>
    <td><?php echo $rowz['a_department'] ; ?></td>
    <td><?php echo $rowz['a_dateHired'] ; ?></td>
    <td><?php echo $rowz['a_dateEnd'] ; ?></td>

  <?php
    $end = $rowz['a_dateEnd'];
    if($end <= date("Y-m-d")){
      $dd = date("Y-m-d");
      $d1 = new DateTime($dd);
      $d2 = new DateTime($end);

      $diff = $d2->diff($d1);
      if($diff->y <= 0){
        $dat = '<b style="color:red">'.$end.'</b>';
      }else{
        $dat = '<b style="color:green">'.$end.'</b>';
      }
    }else{
      $start_date = $end;  
      $date = strtotime($start_date);
      $date = strtotime("+12 Months", $date);
      $d = date("Y-m-d",$date);

      if($d  >= date("Y-m-d")){
        $dat = '<i style="color:orange">'.$end.'</i>';
        $count_notify++;
      }else{
        $dat = $end;
      }
    }
    ?>
   
    <?php
   
   
      $start_date = $end;  
      $date = strtotime($start_date);
      $date = strtotime("+12 Months", $date);
      $d = date("Y-m-d",$date);

      if($d  <= date("Y-m-d")){        
        ?>
         <td><center><a style="font-size: 10px;" href="rehired.php?id=<?= $row['ID'] ?>" class="btn btn-xs btn-warning"> Rehired</a></center></td>
  
        <?php
      }else{        
        ?>
       <td><center><a href="endconview.php?id=<?= $row['a_id'] ?>&casual" class="btn btn-xs btn-success" style="font-size: 10px;">View</a></center></td>
        <?php
      
    }
    ?>
    
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