<?php
include('dbcon.php');
if (isset($_POST['btn_waiting_add'])) 
     {
          date_default_timezone_get("Asia/Manila");
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
          $employeerecord= $_POST['employeerecord'];          
          $age = date_diff(date_create($_POST['birthday']), date_create('now'))->y;
          $dat = date("m-d-Y");

          $verify = mysqli_query($conn, "SELECT count(*) as i FROM tbl_applicants WHERE a_fname = '$fname' AND a_lname = '$lname' AND a_mname = '$mname'");
          $r_v = mysqli_fetch_array($verify);
          if($r_v['i'] == 0){
               $sql = "INSERT INTO `tbl_applicants`(`ID`, `a_fname`, `a_lname`, `a_mname`, `a_gender`, `a_civilStatus`, `a_contactNumber`, `a_religion`, `a_birthday`,`a_age`, `a_region`, `a_provine`, `a_city`, `a_brgy`, `a_education`, `a_masters`, `a_empRecords`, `a_dateApplied`, `a_position`, `a_dateApproved`) VALUES (NULL,'$fname','$lname','$mname','$gender','$civilstat','$contactnum','$religion','$birth','$age','$region','$province','$city','$brgy','$educationalattainment','$educMasters','$employeerecord','$dateapplied','$positiondesired','$dat')";
               $rs = mysqli_query($conn, $sql);
               ?>
               <script type="text/javascript">
                    alert("New Applicant Added.");
                    window.location.href = 'waiting_list.php';
               </script>
               <?php
          }else{
               ?>
               <script type="text/javascript">
                    alert("Applicant is Already Exist.");
                    window.location.href = 'waiting_list.php';
               </script>
               <?php
          }
     }else{
          ?>
          <script type="text/javascript">
               window.location.href = 'waiting_list.php';
          </script>
          <?php
     }     
?>