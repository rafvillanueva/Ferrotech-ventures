<?php
include('dbcon.php');
?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-s8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>Admin Page</title>
     <link rel="stylesheet" href="Bootstrap_Files/libs/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color:gray;border-bottom:4px solid rgb(150, 8, 10);  padding: 5px;">
  <div class="container-fluid">
 <img style="margin-left: -1%;" src="images/header.png" width="300px" height="70px">
   
  

  </div>
</nav>


 <div class="sidebar col-sm-12 col-md-12 col-lg-6" style="margin-top:-20px;">
 <a href="home.php" style="text-decoration: none; letter-spacing:3px;"><li><span style="font-family: 'Calibri'">
        <img src="images/RETURN.png" height="35px"> RETURN
      </span></li></a>



 	 <a type="button" data-toggle="modal" data-target="#logout" style="text-decoration: none; letter-spacing:3px;"><li>  <span style="font-family: 'Calibri'">
        <img src="images/off.png" height="35px"> LOGOUT
      </span></li></a>


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



<!--VIEW MODAL IF YOU TRY ADD USER-->


<div class="modal fade" id="adduser">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            <center>
              <h4 class="modal-title" style="font-family:'Calibri'; font-weight: bold; letter-spacing: 3px;"><img src="images/User_login_man_profile_account.png" width="50px" height="40px"> Add New Account</h4>        
            </center>

      </div> 

        <div class="modal-body">
          
<!--MODAL CONTENT-->
     <form method="POST" action="adminadd_user.php">
      <!--content no.1-->
          <div class="container col-md-12 col-sm-12">

                  <div class="label-group form-horizontal">
                     <label style="letter-spacing: 2px;">Username</label>
                      <input type="text" class="form-control"  placeholder="Enter Username here.." name="username" required>
                  </div>
        
            </div>
<br>
      <!--content no.2-->
            <div class="container col-md-12 col-sm-12">  
              
                  <div class="label-group form-horizontal">
                      <label style="letter-spacing: 2px;">Password</label>
                      <input type="password" class="form-control"  placeholder="Enter password here.." name="password" required>
                  </div>
            </div>

          <label></label>
      </div>      


       
        <div class="modal-footer">
          <button type="submit" name="btn_add_user" class="btn btn-primary" style="letter-spacing:3px;">Submit</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal"  style="letter-spacing:3px;">Close</button>

          </form>
        </div>
      </div>
    </div>
    </div>
</div>

<!--end modal-->



   





<!--SEARCH TABLE-->
<?php
    include('dbcon.php');
?> 
<div class="table-responsive container col-xs-6 col-md-6 col-lg-6" style="margin-left:18px;  width: 1065px;">					


<table class="table table-hover table-striped">
<thead>
	


<tr class="active" style="letter-spacing:3px;">
 <td colspan="3" style="font-weight: bold; background-image: url(images/r.jpg); background-repeat: no-repeat; background-size: cover; color:white; font-size:20px; "><img src="images/userlist.png" height="40
  px" width="60px"> LIST OF ACCOUNTS <button style=" margin-left:51%; letter-spacing: 3px; font-family: 'Calibri'"class="btn btn-success name="adduser" data-toggle="modal" data-target="#adduser"><span class=" glyphicon glyphicon-plus-sign"></span> Create Account </button> 

  </td>



</thead>

    <td style="font-weight: bold;"><center>Username</center></td>      
    <td style="font-weight: bold;"><center>Password</center></td>
    <td style="font-weight: bold;"><center>Action</center></td>


<?php
    $admin_user_query=mysql_query("SELECT * from user");
    while($admin_user_rows=mysql_fetch_array($admin_user_query)){
?>
  <tr>  
        <td><center><?php echo $admin_user_rows['username'] ; ?></center></td>
        <td><center>( <b style="color: red">encrypted</b> )</center></td> 
        
  
        <td>  
            <center>
                  <a  data-toggle="modal" data-target="#del" type="button" class="btn btn-danger"  ><span class="glyphicon glyphicon-trash"></span> Remove</a>
            </center>
        </td>
        

      </tr>

<div class="modal fade" id="del">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          

      </div> 

        <div class="modal-body">
        <center>
          <img src="images/ex.png" height="60px" width="90px"><br><br>
            <p style="font-weight:bold; font-size: 30px;">Are you sure ?</p>
            <p style=" font-size: 20px;">You won't be able to revert this!</p>
        </center>

         
      </div>      

        <div class="modal-footer">
        <a style="width: 180px;" href="del_useradmin.php<?php echo '?id='.$admin_user_rows['id']; ?>" type="submit" name="btn_add_user" class="btn btn-primary btn-lg">Yes, Delete it!
        </a>
          <button  style="width: 100px;" type="button" class="btn-lg btn btn-danger" data-dismiss="modal">Cancel</button>

          </form>
        </div>
      </div>
    </div>
    </div>
</div>

<!--end modal-->




    <?php
    
        }
                                    
    ?>


</table>
		
</div>


  <!--END SEARCH-->




<script src="Bootstrap_Files/libs/bootstrap/js/jquery.min.js"></script>
<script src="Bootstrap_Files/libs/bootstrap/js/bootstrap.min.js"></script>





</body>
</html>