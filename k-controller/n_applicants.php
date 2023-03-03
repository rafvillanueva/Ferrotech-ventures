<div class="modal fade" id="addapp">
  <div class="modal-dialog modal-lg" style="width: 85%;">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 1;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center>
          <img src="images/add_applicant.jpg" height="42px">
          <h3 class="modal-title" style="font-family: oblique; letter-spacing: 2px; font-weight:bold;"> APPLICANT DATA</h3>
        </center>
      </div> 
      <div class="modal-body" style="">
        <form method="POST" action="waitinglist_add_emp.php" class="form-horizontal">
          <div class="row">
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>First name</label>
                <input type="text" class="form-control"  placeholder="Enter First name here.." name="firstname" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Last name</label>
                <input type="text" class="form-control"  placeholder="Enter Last name here.." name="lastname" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Middle name</label>
                <input type="text" class="form-control"  placeholder="Enter Middle name here.." name="middlename"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Sex</label>
                <select name="sex" class="form-control" required>
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
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control"  placeholder="Enter Contact No. here.." name="contactnum"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Religion</label>
                <input type="text" class="form-control"  placeholder="Enter Religion here.." name="religion"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Birthday</label>
                <input type="date" class="form-control" name="birthday"required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Civil Status</label>
                <select name="civilstat" class="form-control" required>
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
                  <option disabled selected value="">--</option>
                  <?php
                    $province = mysqli_query($conn, "SELECT * FROM refregion ORDER BY regDesc ASC");
                    while($row = mysqli_fetch_array($province)){
                      ?>
                      <option value="<?= $row['regCode'] ?>"><?= $row['regDesc'] ?></option>
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
                  <option disable selected value="">--</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>City / Municipality</label>
                <select class="form-control" name="citymun" required id="citymunCode" onchange="getBrgy()">
                  <option disable selected value="">--</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-horizontal">
                <label>Barangay</label>
                <select class="form-control" name="brgy" required id="brgyCode" >
                  <option disable selected value="">--</option>
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
                <option value="" disabled selected>Education Graduate</option>
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
                <option value="" disabled selected>Master's Degree (Optional)</option>
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
              <textarea rows="5" class="form-control"  placeholder="Enter employee record" name="employeerecord"></textarea>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top: 8px;">
          <div class="col-md-6">
            <div class="form-horizontal">
              <label>Date applied</label>
              <input type="date" class="form-control"  placeholder="Enter Date applied" name="dateapplied" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-horizontal">
              <label>Postion desired</label>
              <input type="text" class="form-control"  placeholder="Enter Position desire" name="positiondesired" required>
            </div>
          </div>
        </div>
        <div class="modal-footer" style="border: 0;">          
          <button type="submit" name="btn_waiting_add" class="btn btn-success" style="letter-spacing:2px;"><span class=" glyphicon glyphicon-save"></span> Save record </button>
          <button type="button" class="btn btn-danger " data-dismiss="modal"  style="letter-spacing:2px;"><span class="glyphicon glyphicon-remove"></span> Close </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function getprovince(){
        var regCode = $("#regCode").val();
        $.ajax(
            {
                type:"post",
                url: "k-controller/index.php",
                data: {"regCode": regCode},
                success:function(response)
                {
                    $("#provCode").html(response);
                }
            }
        );
  }

  function getMunicity(){
        var citymunCode = $("#provCode").val();
        $.ajax(
            {
                type:"post",
                url: "k-controller/index.php",
                data: {"citymunCode": citymunCode},
                success:function(response)
                {
                    $("#citymunCode").html(response);
                }
            }
        );
  }

  function getBrgy(){
        var citymunCode = $("#citymunCode").val();
        $.ajax(
            {
                type:"post",
                url: "k-controller/index.php",
                data: {"citymunCodez": citymunCode},
                success:function(response)
                {
                    $("#brgyCode").html(response);
                }
            }
        );
  }
</script>