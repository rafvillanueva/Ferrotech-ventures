<?php
    include('../dbcon.php');
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRIS FERROTECH</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <style type="text/css">
      body{ font-size: 12px; font-family: 'Consolas' }
      table {
    margin: auto;
    width: calc(100% - 40px);
}
    </style>
  </head>
<body onload="window.print()" onafterprint="zcancel()">
  <br>
  
  <div class="container-1fluid">
   <center><img src="../images/logo_print.png" width="300px" height="70px"></center> 
    <h3><b>Reports of Regular Employee.</b></h3>
    <?php
    if(isset($_GET['zdepartment'])){
      $from = $_GET['from'];
      $to = $_GET['to'];
      $dep = $_GET['zdepartment'];
      ?>
      From : <b><?= $from ?></b> &nbsp; To : <b><?= $to ?></b> &nbsp; Department : <b><?= $dep ?></b>
      <?php
  }elseif(isset($_GET['zfrom'])){
    $from = $_GET['zfrom'];
    $to = $_GET['zto'];
   ?>
    From : <b><?= $from ?></b> &nbsp; To : <b><?= $to ?></b>
    <?php
  }elseif(isset($_GET['department'])){  
      $dep = $_GET['department'];
      ?>
      Department : <b><?= $dep ?></b>
      <?php
  }elseif(isset($_GET['value'])){        
    $val = $_GET['value'];
    ?>
    Search Keywords : <i>`</i><b><?= $val ?></b><i>`</i>
    <?php
  }elseif(isset($_GET['type'])){
    $typo = $_GET['type'];
    if($typo == "all"){
   ?>
    Search Keywords : <i>`</i><b>All Evaluated</b><i>`</i>
    <?php
    }elseif($typo == "not"){
       ?>
    Search Keywords : <i>`</i><b>All Not Evaluated</b><i>`</i>
    <?php
    }
  }elseif(isset($_GET['keyword'])){          
    ?>
    Search Keywords : <i>`</i><b>All Employees</b><i>`</i>
    <?php
  }else{
    ?>
    Search Keywords : <i>`</i><b>All Employees</b><i>`</i>
    <?php
  }
    ?>

    <hr>
    <table border="1" width="100" class="table">
      <thead>
        <tr class="active" style="font-weight: bold; font-size: 13px;">
          <th width="100">Employee ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Middle Name</th>
          <th>Position</th>
          <th>Department</th>
          <th>Ratings</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($_GET['zdepartment'])){
            $from = $_GET['from'];
            $to = $_GET['to'];
            $dep = $_GET['zdepartment'];
            $sql = "SELECT * FROM tbl_applicant_field WHERE a_dateHired <= '$to' AND a_dateEnd >= '$from' AND a_department = '$dep'";
            $query = mysql_query($sql)or die(mysql_error());
        }elseif(isset($_GET['zfrom'])){
          $from = $_GET['zfrom'];
          $to = $_GET['zto'];
          $sql = "SELECT * FROM tbl_applicant_field WHERE a_dateHired <= '$to' AND a_dateEnd >= '$from'";
          $query = mysql_query($sql)or die(mysql_error());
        }elseif(isset($_GET['department'])){  
            $dep = $_GET['department'];
            $sql = "SELECT * FROM tbl_applicant_field WHERE a_department = '$dep'";
            $query = mysql_query($sql)or die(mysql_error());
        }elseif(isset($_GET['value'])){        
          $val = $_GET['value'];
          $query = mysql_query("SELECT * from tbl_applicants WHERE a_status = 'Regular' AND (a_id LIKE '%$val%' OR a_lname LIKE '%$val%' OR a_fname LIKE '%$val%' OR a_mname LIKE '%$val%') AND a_status = 'Regular'")or die(mysql_error());
        }elseif(isset($_GET['type'])){
          $typz = $_GET['type'];
          if($typz == "all"){
            $query = mysql_query("SELECT * from tbl_ratings WHERE a_type = 'Regular' AND a_rate NOT LIKE ''")or die(mysql_error());
          }elseif($typz == "not"){
            $query = mysql_query("SELECT * from tbl_applicants where a_status = 'Regular' ORDER BY ID DESC")or die(mysql_error());
          }
        }elseif(isset($_GET['keyword'])){          
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
          if(isset($_GET['type'])){
            $cc = mysql_query("SELECT * from tbl_ratings WHERE a_type = 'Regular' AND a_id = '$id'")or die(mysql_error());
            if(mysql_num_rows($cc) == 0){
               ?>
                <tr style="text-transform: uppercase; font-size: 13px;">
                  <td><?= $row['a_id'] ?></td>
                  <td><?php echo $row['a_fname']; ?></td>
                  <td><?php echo $row['a_lname']; ?></td>
                  <td><?php echo $row['a_mname']; ?></td>
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
                  <td><?php echo $row['a_fname']; ?></td>
                  <td><?php echo $row['a_lname']; ?></td>
                  <td><?php echo $row['a_mname']; ?></td>
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
  <script type="text/javascript">
    function zcancel() {
      window.close();
    }
  </script>
</body>
</html>
