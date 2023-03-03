<?php
include('dbcon.php');
?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Home page</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
	
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color:gray;border-bottom:4px solid rgb(150, 8, 10);  padding: 5px;">
  <div class="container-fluid">
 <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
   
  

  </div>
</nav>

<style type="text/css">
.sidebar{
  background-color:white;
  border-right:solid rgb(150, 8, 10);
  margin-left: -8px;
  width: 20%;
  height: 600px;
  

}
li{
  font-weight: bold;
  list-style-type: none;
  color: black;
  padding: 10px 20px;
  border-bottom:1px solid black;
  width:259px;
  font-family: oblique;
  font-size: 15px;
  margin-left: -5px;

}
li:hover{

  background:white;
  color:white;
  background-size: cover;
  width: 257px;
  color:black;

}


    p{
  font-weight: bold;
  list-style-type: none;
  color: black;
  padding: 10px 25px;
  border-bottom:1px solid black;
  width: 259px;
  font-family: 'Calibri';
  font-size: 18px;
  margin-left: -6px;

}

</style>
 <div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px; background-color:rgb(234, 237, 209);"><br>
<p style="font-size:18px; font-family:'Calibri'; letter-spacing: 1px; font-weight: bold; ">Administrator</p>
     

<br><br>

   <a href="adminlist_user.php" type="button" style="text-decoration: none;"><li>  <span style="font-family: 'Calibri'; letter-spacing: 1px; font-size: 16px;">
        <img src="images/User_login_man_profile_account.png" height="40px" width="40px;"> User Accounts
      </span></li></a>



 	 <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none; letter-spacing: 2px; font-size: 16px;"><li>  <span style="font-family: 'Calibri'">
        <img src="images/off.png" height="40px" width="40px">  Logout
      </span></li></a>



 </div>



<style type="text/css">
  h4{
    font-family: 'Calibri';
  }
</style>


<div class="col-xs-12 col-md-3" style="width:360px;">
          <div class="panel panel-default" style=" border-radius:8px;">
            <div class="panel-body" style="background-color:rgb(234, 237, 209); border-radius:8px;" >
              
              <img style="height: 400px;width: 490px;" src="images/emplist.png" alt="article1" class="img-thumbnail">
              
            
              <div class="caption">
               <center> <h4 style="font-weight: bold; margin-top: 16px; letter-spacing:1px;">EMPLOYEE LIST & RESERVED &nbspAPPLICANT</h4></center>
                
                <form>
                 <center> <a href="casual_list.php"><button  class="btn btn-primary" type="button" style="letter-spacing: 4px; font-family: 'Calibri'"><span class="glyphicon glyphicon-user"></span> VIEW RECORD</button></a></center>
                 </div> 
                </form>
              </div>
            </div>
</div>





<div class="col-xs-12 col-md-3" style="width:360px;">
          <div class="panel panel-default" style=" border-radius:8px;">
            <div class="panel-body" style="background-color:rgb(234, 237, 209); border-radius:8px;">
              
              <img style="height: 400px;width: 490px;" src="images/evaluation.png" alt="article1" class="img-thumbnail">
              
            
              <div class="caption" style="margin-top: 4px;">
               <center> <h4 style="font-weight: bold; margin-top: 15px;  letter-spacing: 3px; ">PERFORMANCE RATING</h4></center>
                
                <form>
                <br>
              <center><a href="casualeval_list.php">
                  <button class="btn btn-primary" type="button" style="letter-spacing: 4px; font-family:'Calibri'"><span class=" glyphicon glyphicon-list"></span> EVALUATE</button></a></center> 
                 </div> 
                </form>
              </div>
            </div>
</div>
 


<div class="col-xs-12 col-md-3" style="width:360px;">
          <div class="panel panel-default" style=" border-radius:8px;">
            <div class="panel-body" style="background-color:rgb(234, 237, 209); border-radius:8px;">
              
              <img style="height: 400px;width: 490px;" src="images/report.png" alt="article1" class="img-thumbnail">
              
            
              <div class="caption" style="margin-top:4px; ">
                <center><h4 style="font-weight: bold; margin-top: 15px; letter-spacing: 3px;">ANALYSIS & REPORTING</h4></center>
                
                <form>
                  <br>
           <center>  <a href="analysis&reporting.php">
                  <button class="btn btn-primary" type="button" style="letter-spacing: 4px; font-family: 'Calibri'"><span class="glyphicon glyphicon-check"></span> VIEW</button></a></center> 
                 </div>
                  
                </form>
              </div>
            </div>
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
            <h4 class="alert alert-danger" style="font-weight:bold; font-family: oblique;" >Are you sure do you want to log-out ?</h4>
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












<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>





</body>
</html>