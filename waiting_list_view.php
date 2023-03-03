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
  <style type="text/css">
    body h1 h2 h3 h4 h5 h6 button{
      font-family: "century gothic";
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse" style="background-color:gray;border-bottom:4px solid rgb(150, 8, 10);  padding: 5px;">
  <div class="container-fluid">
    <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
  </div>
</nav>
<div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;">
 	 <a href="waiting_list.php" style="text-decoration: none;"><li><span style="font-family: 'Calibri'"><img src="images/return.png" height="35px"> &nbsp; RETURN </span></li></a>
 	 <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none;"><li><span style="font-family: 'Calibri'"><img src="images/off.png" height="35px"> &nbsp; LOG OUT</span></li></a>
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
            <p class="alert alert-danger" style="font-weight:bold; font-family: oblique;">Are you sure do you want to log-out ?</p>
        </center>
      </div>
      <div class="modal-footer">
        <a href="index.php" type="button" name="btn_add_user" class="btn btn-primary "><span class="glyphicon glyphicon-check"></span> YES</a>
        <button type="button" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
      </div>
    </div>
  </div>
</div>
<!--end modal-->


<h2 style=" margin-left: 22%; margin-top:2%;">
  <span><img src="images/emp_info.jpeg" height="45px"></span> <b style="font-size: 20px; letter-spacing: 2px;">Applicant Information</b>
</h2>
<br><br>
<div class="container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px; margin-top: -20px; width: 1050px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      Information :: Applicant
    </div>
    <div class="panel-body">
      <form method="POST" action="?id=<?= $_GET['id'] ?>" class="form-horizontal">        
        <?php
          if(isset($_POST['btn_waiting_update'])){
            date_default_timezone_get("Asia/Manila");
            $id = $_GET['id'];
            $lname = $_POST['lastname'];
            $fname = $_POST['firstname'];
            $mname = $_POST['middlename'];
            $gender = $_POST['sex']; 
            $birth = $_POST['birthday'];
            $civilstat = $_POST['civilstat'];
            $religion = $_POST['religion'];
            $region = $_POST['region'];
            $province = $_POST['province'];
            $city = $_POST['citymun'];
            $brgy = $_POST['brgy'];
            $positiondesired = $_POST['positiondesired'];
            $dateapplied = $_POST['dateapplied'];
            $contactnum = $_POST['contactnum'];          
            $educationalattainment=$_POST['educationalattainment']; 
            $educMasters = $_POST['masters'];
            $employeerecord=$_POST['employeerecord'];          
            $age = date_diff(date_create($_POST['birthday']), date_create('now'))->y;
            $dat = date("m-d-Y");

            $sql = "UPDATE `tbl_applicants` SET `a_fname`='$fname',`a_lname`='$lname',`a_mname`='$mname',`a_gender`='$gender',`a_civilStatus`='$civilstat',`a_contactNumber`='$contactnum',`a_religion`='$religion',`a_birthday`='$birth',`a_age`='$age',`a_region`='$region',`a_provine`='$province',`a_city`='$city',`a_brgy`='$brgy',`a_education`='$educationalattainment',`a_masters`='$educMasters',`a_empRecords`='$employeerecord',`a_dateApplied`='$dateapplied',`a_position`='$positiondesired' WHERE ID = '$id'";
            
            $rs = mysqli_query($conn, $sql);
            ?>
            <script type="text/javascript">
              alert("Applicant Information updated.");
              window.location.href = 'waiting_list_view.php?id=<?= $id ?>';
            </script>
            <?php
          }


        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $rs = mysqli_query($conn, "SELECT * FROM tbl_applicants WHERE ID = '$id'");
          $row = mysqli_fetch_array($rs);
        }else{
          ?>
          <script type="text/javascript">window.location.href = "waiting_list.php"</script>
          <?php
        }
        ?>
          <div class="row">
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>First name</label>
                <input type="text" class="form-control" value="<?= $row['a_fname'] ?>" placeholder="Enter First name here.." name="firstname" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Last name</label>
                <input type="text" class="form-control" value="<?= $row['a_lname'] ?>" placeholder="Enter Last name here.." name="lastname" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Middle name</label>
                <input type="text" class="form-control" value="<?= $row['a_mname'] ?>" placeholder="Enter Middle name here.." name="middlename"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Sex</label>
                <select name="sex" class="form-control" required>
                  <option selected><?= $row['a_gender'] ?></option>
                  <option value="">----</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row" style="padding-top: 8px;">
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Contact No.</label>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" class="form-control" value="<?= $row['a_contactNumber'] ?>"  placeholder="Enter Contact No. here.." name="contactnum"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Religion</label>
                <input type="text" class="form-control" value="<?= $row['a_religion'] ?>"  placeholder="Enter Religion here.." name="religion"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Birthday</label>
                <input type="date" class="form-control" value="<?= $row['a_birthday'] ?>" name="birthday"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Civil Status</label>
                <select name="civilstat" class="form-control" required>
                  <option selected><?= $row['a_civilStatus'] ?></option>
                  <option value="">----</option>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Separated</option>
                  <option>Widowed</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row" style="padding-top: 8px;">
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Region </label>
                <select class="form-control" id="regCode" name="region" onchange="getprovince()" required>
                  <?php
                    $code = $row['a_region'];
                    $d_address = mysqli_query($conn, "SELECT * FROM refregion WHERE regCode = '$code'");
                    $r_address = mysqli_fetch_array($d_address);
                  ?>
                  <option selected value="<?= $code ?>"><?= $r_address['regDesc'] ?></option>
                  <option disabled value="">--</option>
                  <?php
                    $province = mysqli_query($conn, "SELECT * FROM refregion ORDER BY regDesc ASC");
                    while($rowz = mysqli_fetch_array($province)){
                      ?>
                      <option value="<?= $rowz['regCode'] ?>"><?= $rowz['regDesc'] ?></option>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Province </label>
                <select class="form-control" name="province" required id="provCode" onchange="getMunicity()">
                  <?php
                    $code = $row['a_provine'];
                    $d_address = mysqli_query($conn, "SELECT * FROM refprovince WHERE provCode = '$code'");
                    $r_address = mysqli_fetch_array($d_address);
                  ?>
                  <option selected value="<?= $code ?>"><?= $r_address['provDesc'] ?></option>
                  <option disable value="">--</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>City / Municipality</label>
                <select class="form-control" name="citymun" required id="citymunCode" onchange="getBrgy()">
                  <?php
                    $code = $row['a_city'];
                    $d_address = mysqli_query($conn, "SELECT * FROM refcitymun WHERE citymunCode = '$code'");
                    $r_address = mysqli_fetch_array($d_address);
                  ?>
                  <option selected value="<?= $code ?>"><?= $r_address['citymunDesc'] ?></option>
                  <option disable value="">--</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Barangay</label>
                <select class="form-control" name="brgy" required id="brgyCode" >
                  <option selected><?= $row['a_brgy'] ?></option>
                  <option disable value="">--</option>
                </select>
              </div>
            </div>
          </div>
        <br>
        <b style="color: red;">Educational Attainment *</b>
        <hr>
        <div class="row" style="padding-top: 8px;">
          <div class="col-md-12">
            <div class="form-horizontal">
              <select name="educationalattainment" class="form-control" required="" style="text-transform: uppercase;">
                <option selected><?= $row['a_education'] ?></option>
                <option value="" disabled>Education Graduate</option>
                <option value="Elementary graduate">Elementary graduate</option>
                <option value="Highschool graduate">Highschool graduate</option>
                <option value="Vocational graduate">Vocational graduate</option>
                 <option value="College graduate">College graduate</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top: 8px;">
          <div class="col-md-12">
            <div class="form-horizontal">
              <select name="masters" class="form-control" style="text-transform: uppercase;">
                <option selected><?= $row['a_masters'] ?></option>
                <option value="" disabled>Master's Degree (Optional)</option>
                <option>Master of Accountancy</option>
                <option>Master of Advanced Study</option>
                <option>Master of Applied Finance</option>
                <option>Master of Applied Science</option>
                <option>Master of Architecture</option>
                <option>Master of Arts in Liberal Studies</option>
                <option>Master of Arts in Special Education</option>
                <option>Master of Arts in Teaching</option>
                <option>Master of Bioethics</option>
                <option>Master of Business Administration</option>
                <option>Master of Business, Entrepreneurship and Technology</option>
                <option>Master of Business</option>
                <option>Master of Business Engineering</option>
                <option>Master of Business Informatics</option>
                <option>Master of Chemistry</option>
                <option>Master of City Planning</option>
                <option>Master of Commerce</option>
                <option>Master of Computational Finance</option>
                <option>Master of Computer Applications</option>
                <option>Master of Counselling</option>
                <option>Master of Criminal Justice</option>
                <option>Master in Creative Technologies</option>
                <option>Master in Data Science</option>
                <option>Master of Defence Studies</option>
                <option>Master of Design</option>
                <option>Master of Divinity</option>
                <option>Master of Economics</option>
                <option>Master of Education</option>
                <option>Master of Engineering</option>
                <option>Master of Engineering Management</option>
                <option>Master of Enterprise</option>
                <option>Master of Finance</option>
                <option>Master of Financial Economics</option>
                <option>Master of Financial Engineering</option>
                <option>Master of Financial Mathematics</option>
                <option>Master of Fine Arts</option>
                <option>Master of Health Administration</option>
                <option>Master of Health Science</option>
                <option>Master of Humanities</option>
                <option>Master of Industrial and Labor Relations</option>
                <option>Master of International Affairs</option>
                <option>Master of International Business</option>
                <option>Masters in International Economics</option>
                <option>Master of International Studies</option>
                <option>Master of Information Management</option>
                <option>Master of Information System Management</option>
                <option>Master of Jurisprudence</option>
                <option>Master of Laws</option>
                <option>Master of Mass Communication</option>
                <option>Master of Studies in Law</option>
                <option>Master of Landscape Architecture</option>
                <option>Master of Letters</option>
                <option>Master of Liberal Arts</option>
                <option>Master of Library and Information Science</option>
                <option>Master of Management</option>
                <option>Master of Mathematical Finance</option>
                <option>Master of Mathematics</option>
                <option>Master of Medical Science</option>
                <option>Master of Medicine</option>
                <option>Masters of Military Art and Science</option>
                <option>Master of Occupational Behaviour and Development</option>
                <option>Master of Occupational Therapy</option>
                <option>Master of Pharmacy</option>
                <option>Master of Philosophy</option>
                <option>Master of Physician Assistant Studies</option>
                <option>Master of Physics</option>
                <option>Master of Political Science</option>
                <option>Master of Professional Studies</option>
                <option>Master of Psychology</option>
                <option>Master of Public Administration</option>
                <option>Master of Public Affairs</option>
                <option>Master of Public Health</option>
                <option>Master of Public Management</option>
                <option>Master of Public Policy</option>
                <option>Master of Public Relations</option>
                <option>Master of Social Work</option>
                <option>Master of Public Service</option>
                <option>Master of Quantitative Finance</option>
                <option>Master of Rabbinic Studies</option>
                <option>Master of Real Estate Development</option>
                <option>Master of Religious Education</option>
                <option>Master of Research</option>
                <option>Master of Sacred Music</option>
                <option>Master of Sacred Theology</option>
                <option>Master of Science in Administration</option>
                <option>Master of Science in Bioinformatics</option>
                <option>Master of Science in Computer Science</option>
                <option>Master of Science in Counselling</option>
                <option>Master of Science in Cyber Security</option>
                <option>Master of Science in Engineering</option>
                <option>Master of Science in Development Administration</option>
                <option>Master of Science in Finance</option>
                <option>Master of Science in Health Informatics</option>
                <option>Master of Science in Human Resource Development</option>
                <option>Master of Science in Information Assurance</option>
                <option>Master of Science in Information Systems</option>
                <option>Master of Science in Information Technology</option>
                <option>Master of Science in Leadership</option>
                <option>Master of Science in Management</option>
                <option>Master of Science in Nursing</option>
                <option>Master of Science in Project Management</option>
                <option>Master of Science in Supply Chain Management</option>
                <option>Master of Science in Teaching</option>
                <option>Master of Science in Taxation</option>
                <option>Master of Social Science</option>
                <option>Master of Social Work</option>
                <option>Master of Studies</option>
                <option>Master of Surgery</option>
                <option>Master of Theological Studies</option>
                <option>Master of Technology</option>
                <option>Master of Urban Planning</option>
                <option>Master of Veterinary Science</option>
                <option>Master of Worship studies</option>
                <option>Master of Water security</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top: 8px;">
          <div class="col-md-12">
            <div class="form-horizontal">
              <label>Employee Record</label>
              <textarea rows="5" class="form-control"  placeholder="Enter employee record" name="employeerecord" required><?= $row['a_empRecords'] ?></textarea>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top: 8px;">
          <div class="col-md-6">
            <div class="form-horizontal">
              <label>Date applied</label>
              <input type="date" class="form-control" value="<?= $row['a_dateApplied'] ?>" placeholder="Enter Date applied" name="dateapplied" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-horizontal">
              <label>Postion desired</label>
              <input type="text" class="form-control" value="<?= $row['a_position'] ?>" placeholder="Enter Position desire" name="positiondesired" required>
            </div>
          </div>
        </div>
        <br>  
          <button style="letter-spacing: 2px;" type="submit" name="btn_waiting_update" class="btn btn-success"><span class=" glyphicon glyphicon-check"></span> Save Changes</button>
          <a href="waiting_list_approved.php?id=<?= $row['ID'] ?>" style="letter-spacing: 2px;" class="btn btn-primary"> <span class="glyphicon glyphicon-pause"></span> Verify & Approved</a>
        </form>
    </div>
  </div>
</div>
<!--VIEW MODAL TO ADD APPLICANT-->
<!-- EDITED -->
<?php include("k-controller/n_applicants.php"); ?>
<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>