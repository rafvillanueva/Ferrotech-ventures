<?php
include 'dbcon.php';
$id = $_GET['id'];
if(isset($_GET['type'])){
    $id = $_GET['id'];
    $rate = $_GET['rate'];
    $type = $_GET['type'];

    $verify = mysqli_query($conn, "SELECT * FROM tbl_ratings WHERE a_id = '$id' AND a_type = '$type'");
    $count = mysqli_num_rows($verify);
    if($count == 0){
        $date = date("Y-m-d");
        $sql = "INSERT INTO tbl_ratings VALUES(NULL,'$id','$type','$rate','$date')";
        $rs = mysqli_query($conn, $sql);
        ?>
            <script type="text/javascript">
                alert("Evaluation Completed.");
                window.location.href = 'Regularevaluation.php?id=<?= $id ?>';
            </script>
        <?php
    }else{
        ?>
            <script type="text/javascript">
                alert("Evaluated Already.");
                window.location.href = 'Regularevaluation.php?id=<?= $id ?>';
            </script>
        <?php
    }
}elseif(isset($_GET['evaluate'])){
    $id = $_GET['id'];
    $type = $_GET['typez'];

    $sql = "DELETE FROM tbl_ratings WHERE a_id = '$id' AND a_type = '$type'";
    $rs = mysqli_query($conn, $sql);

    ?>
    <script type="text/javascript">window.location.href = 'Regularevaluation.php?id=<?= $id ?>'</script>
    <?php
}elseif(isset($_GET['promote'])){
    $id = $_GET['id'];
    $type = $_GET['typezz'];

    $sql = "UPDATE tbl_applicants SET a_status = 'Project Based' WHERE a_id = '$id'";
    $rs = mysqli_query($conn, $sql);

    ?>
    <script type="text/javascript">window.location.href = 'Regulareval_list.php'</script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-s8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title></title>
    <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<body>
<?php 
    $table_list_query = mysql_query("SELECT * from tbl_applicants where a_id ='$id'");
    $table_list_rows = mysql_fetch_array($table_list_query);

    $table_list_query_1 = mysql_query("SELECT * from tbl_applicant_field where a_id ='$id'");
    $table_list_rows_1 = mysql_fetch_array($table_list_query_1);
?>
<nav class="navbar navbar-inverse" style="background-color:gray; border: 0px; border-bottom:4px solid rgb(150, 8, 10); border-radius: 0; padding: 5px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;">
    <a href="Regulareval_list.php" style="text-decoration: none;"><li><span style="font-family: 'Calibri'"><img src="images/RETURN.png" height="35px"> &nbsp; RETURN </span></li></a>
     <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;">
    <li><span style="font-family: 'Calibri'"><img src="images/off.png" height="35px"> &nbsp; LOG OUT</span> </li></a>
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
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary"><span class=" glyphicon glyphicon-check"></span> Yes
        </a>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class=" glyphicon glyphicon-remove"></span>No</button>
      </div>
    </div>
  </div>
</div>
<!--end modal-->
<h2 style="margin-left: 22%; margin-top:2%; "> 
  <img src="images/emp_rating.png" height="50px" width="50px"> <b style="letter-spacing: 2px; font-family: 'Calibri';">Regular Evaluation</b></h2>
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;"> 
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading" style=" letter-spacing: 2px;">
            <div class="pull-left"> Evaluation Form </div>
            <div class="pull-right" style="position: relative; top: -7px; left: 12px;"> <a href="Regular_endconform.php?id=<?= $id ?>" class="btn btn-warning btn-md">End Contact</a></div>
            <br>
        </div>
        <div class="panel-body">
            Name : <b style="text-transform: uppercase; letter-spacing: 1px; font-family: 'Calibri'; color: green;"><u><?= $table_list_rows['a_lname'] . ", " . $table_list_rows['a_fname'] . " " . $table_list_rows['a_mname'] ?></u></b><br>
            Postion : <b style="text-transform: uppercase; letter-spacing: 1px; font-family: 'Calibri'; color: green;"><u><?= $table_list_rows['a_position'] ?></u></b><br>
            Department : <b style="text-transform: uppercase; letter-spacing: 1px; font-family: 'Calibri'; color: green;"><u><?= $table_list_rows_1['a_department'] ?></u></b>
            <hr>
            <?php
            $verify = mysqli_query($conn, "SELECT * FROM tbl_ratings WHERE a_id = '$id' AND a_type = 'Regular'");
            $count = mysqli_num_rows($verify);
            $ver_row = mysqli_fetch_array($verify);
            if($count == 0){
            ?>

<center>
<div class="panel panel-primary">
        <div class="panel-heading" style="letter-spacing:4px;"><span class="glyphicon glyphicon-list"></span> Score adjectival</div>
                    <div class="panel-body" style="font-weight: bold;"> (5) Outstanding &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;(4) Very Satisfactory  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (3) Satisfactory  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (2) Fair  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (1) Poor</div>
</div>
</center>

            
            <table class="table table-responsive " cellpadding="5"  cellspacing="0">
            <tr>
                <th colspan="7" class="active"style="background:#eee;">               
                    <h6 style="font-family: Corbel; font-weight: bold; color: #333;">
                        <b style="font-size: 19px; letter-spacing: 2px;">Evaluation :: PART I</b>
                    </h6> 
                </th>
            </tr>
            <tr>
                <th align="left"> 1. Knowledge of Work:
                    <td>
                    <input type="hidden" name="id" id="idx" value="<?php echo $_GET['id'] ?>">
                    <input type="hidden" name="status" id="status" value="Regular">
                        <select class="form-control" name="num1" id="num1" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"> 2. Quantity of Work:
                        <td>
                        <select class="form-control" name="num2" id="num2" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
            </tr>
            <tr>
                <th align="left"> 3. Quality of Work:
                    <td>
                        <select class="form-control" name="num3" id="num3" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"> 4. Analytical Ability:
                    <td colspan="4">
                        <select class="form-control" name="num4" id="num4" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
            </tr>
            <tr>
                <th align="left"> 5. Oral Communication:
                    <td width="150">
                        <select class="form-control" name="num5" id="num5" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"> 6. Care of tools/Equipment:
                    <td width="150">
                        <select class="form-control" name="num6" id="num6" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
            </tr>
            <tr>
                <th align="left"> 7. Flexibility & Ability to Learn:
                    <td>
                        <select class="form-control" name="num7" id="num7" required="" onchange="part_i()">
                            <option disabled selected value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"><label style="font-family:Corbel; color: red; font-size: 24PX;">TOTAL</label>
                    <td colspan="4"><input placeholder="0" class="form-control" type="text" readonly id="part1_total" onchange="get_ratings()">
                    </td>
                </th>
            </tr>
            </table>
            <hr>
            <table class="table table-responsive " cellpadding="5"  cellspacing="0">
                <tr>
                    <th colspan="7" class="active"style="background:#eee;">               
                        <h6 style="font-family: Corbel; font-weight: bold; color: #333;">
                            <b style="font-size: 19px; letter-spacing: 2px;">Evaluation :: PART II</b>
                        </h6> 
                    </th>
                </tr>
                <tr>
                <th align="left"> 1. Loyalty:
                    <td width="150">
                        <select class="form-control" name="num8" id="num8" required="" onchange="part_ii()">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"> 2. Initiative:
                    <td width="150">
                        <select class="form-control" name="num9" id="num9" required="" onchange="part_ii()">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
            </tr>
            <tr>
                <th align="left"> 3. Dependability:
                    <td>
                        <select class="form-control" name="num10" id="num10" required="" onchange="part_ii()">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"> 4. Cooperation:
                    <td colspan="6">
                        <select class="form-control" name="num11" id="num11" required="" onchange="part_ii()">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
            </tr>
            <tr>
                <th align="left"> 5. Awareness and Compliance with Company Rules and Regulations:
                    <td>
                        <select class="form-control" name="num12" id="num12" required="" onchange="part_ii()">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
                <th align="left"> 6. Attendance:
                    <td colspan="6">
                        <select class="form-control" name="num13" id="num13" required="" onchange="part_ii()">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </th>
            </tr>
            <tr>
                <td align="left" class="active"> 
                    <label style="font-family: Corbel; color: blue; font-size: 24PX;">RATING'S</label>
                </td>
                <td align="left" class="active"> 
                   <input class="form-control" id="ratings" name="ratings" type="text" value="0" readonly>
                </td>
                <td align="left" class="active"> 
                   <label  value="Rating" style="font-family: Corbel; color:red; font-size: 24PX;">TOTAL</label>
                </td>
                <td colspan="3" class="active">
                    <input placeholder="---" class="form-control" id="part2_total" type="text" value="0" readonly onchange="get_ratings()">
                </td>                
            </tr>
        </table>
        <hr>
        <div id="confirm_panel">
            <button class="btn btn-success btn-md" type="button" onclick="confirm()" style="letter-spacing: 2px;">
                <span class="glyphicon glyphicon-saved"></span> SUBMIT
            </button>
        </div>
        <div id="final_panel" style="display: none;">
            <p class="alert alert-info" style="font-weight:bold; font-size: 15px; font-family: Corbel;" >Are you sure do you  want to save this rating ? </p>
            <button onclick="saved_rate_reg()" type="button" name="btn_add_user" class="btn btn-primary">
                <span class="glyphicon glyphicon-check"></span> YES
            </button>
              <button type="button" onclick="cancel()" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> NO</button>
        </div>        
        <?php 
        }else{
                
              $ratings = mysqli_query($conn, "SELECT * FROM tbl_ratings WHERE a_id = '$id' AND a_type = 'Regular'");
              $rate_row = mysqli_fetch_array($ratings);
              $ratez = $rate_row['a_rate'];
              if($ratez <= 51){
                $adjective = 'Need Improvements';
              }elseif($ratez <= 52 || $ratez <= 64){
                 $adjective = 'Below Average';
              }elseif($ratez <= 65 || $ratez <= 77){
                 $adjective = 'Meet Expectation';
              }elseif($ratez <= 78 || $ratez <= 89){
                 $adjective = 'Commendable';
              }elseif($ratez <= 90 || $ratez <= 100){
                 $adjective = 'Outstanding';
              }
              if(empty($ratez)){
                $adjective = "-";
              }
            ?>


<CENTER>
<div class="panel panel-primary">
        <div class="panel-heading" style="letter-spacing:4px;"><span class="glyphicon glyphicon-list"></span>Persformance Rating Scale</div>
                   <center><div class="panel-body" style="font-weight: bold;"> (90%-100%) OUTSTANDING &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;(78%-89%) COMMENDABLE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  (65%-77%) MEET EXPECTATIONS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (52%-64%) BELOW AVERAGE  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (0%-51%) NEEDS IMPROVEMENT</div></center> 
</div>
</CENTER>

            
            <h2 class="alert alert-success" style="letter-spacing: 2px;"><center>TOTAL RATE : <b><?= $ver_row['a_rate'] ?>%</b> (<SMALL style="text-transform: uppercase;"><?= $adjective ?></SMALL>)</center></h2>
            <hr>
            <center>
                <div id="front_panel" style="display: none;">
                    <h2><b style="font-family: Corbel; letter-spacing: 0px;">
                        <i style="color: red;">`PROMOTION IS AVAILABLE`<br></i>
                        DO YOU WANT TO PROMOTE THIS EMPLOYEE ?</b>
                    </h2>
                    <button href="" class="btn btn-md btn-success" onclick="Yes()" disabled>Yes. I want to promote this.</button>
                    <button class="btn btn-md btn-primary" onclick="No()">No. Let me evaluate again.</button>
                </div>
                <div id="yes_panel" style="display: none;">
                    <h2><b style="font-family: Corbel; letter-spacing: 0px;">
                        ARE YOU SURE YOU WANT TO PROMOTE THIS EMPLOYEE ?</b>
                    </h2>
                    <a href="Regularevaluation.php?id=<?= $id ?>&typezz=Regular&promote" class="btn btn-md btn-success">
                        Confirm
                    </a>
                    <button class="btn btn-md btn-danger" onclick="Yes_cancel()">Cancel</button>
                </div>
                <div id="no_panel" style="display: block;">
                    <h2><b style="font-family: Corbel; letter-spacing: 0px;">
                        DO YOU WANT TO EVALUATE AGAIN ?</b>
                    </h2>
                    <a href="Regularevaluation.php?id=<?= $id ?>&typez=Regular&evaluate" class="btn btn-md btn-success">
                        Confirm
                    </a>
                    <button class="btn btn-md btn-danger" onclick="No_cancel()">Cancel</button>
                </div>
            </center>
            <hr>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<script src="k-controller/evaluation.js"></script>
<script type="text/javascript">
    function Yes() {
        document.getElementById("yes_panel").style.display = 'block';
        document.getElementById("front_panel").style.display = 'none';
    }
    function No() {
        document.getElementById("no_panel").style.display = 'block';
        document.getElementById("front_panel").style.display = 'none';
    }
    function Yes_cancel() {
        document.getElementById("yes_panel").style.display = 'none';
        document.getElementById("front_panel").style.display = 'block';
    }
    function No_cancel() {
        document.getElementById("no_panel").style.display = 'none';
        document.getElementById("front_panel").style.display = 'block';
    }
</script>
<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>






