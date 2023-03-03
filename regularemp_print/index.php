
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


  </head>

  <body>

   
	
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">

			
			<br />
			
			<div class="table-responsive">
				<table class="table table-bordered">
        <tr>
        <th colspan="6">
            
      <form method="post" action="data-print.php" target="_new" class="form-inline">
        <div class="form-group">
    
        <button style="margin-top:-20px;font-family: oblique;" type="submit" name="search" class="btn btn-primary"><span style="margin-right: 2px;" class="glyphicon glyphicon-print"></span>PRINT</button> 
      
        <a href="http://localhost/OLD%20HRIS/regulareval_print.php">
          <button style="margin-top:-20px;font-family: oblique;" type="button"class="btn btn-danger"><span style="margin-right: 2px;" class="glyphicon glyphicon-remove"></span>CANCEL</button> 
        </a>


        <label style="font-family:oblique; font-size:25px; margin-left:280px;margin-top: 10px;">REGULAR EMPLOYEE LIST</label>
        </div>
      </form>
          </th>
        </tr>

					<tr>
						      <th><center>Id number</center></th>
                  <th><center>First name</center></th>
                  <th><center>Middle name</center></th>
                  <th><center>Last name</center></th>
                  <th><center>Position</center></th>
                  <th><center>Department</center></th>
					</tr>
				<?php
					include ('database_print.php');
					$result = $database->prepare ("SELECT * FROM table_list where record_status = 'regular' order by id DESC");
					$result ->execute();
					for ($count=0; $row_member = $result ->fetch(); $count++){
					$id = $row_member['id'];
				?>
					<tr>
					      <td style="text-align:center;"><?php echo $row_member['idnumber']; ?></td>
                <td style="text-align:center;"><?php echo $row_member['firstname']; ?></td>
                <td style="text-align:center;"><?php echo $row_member['middlename']; ?></td>
                <td style="text-align:center;"><?php echo $row_member['lastname']; ?></td>
                <td style="text-align:center;"><?php echo $row_member['position']; ?></td>
                <td style="text-align:center;"><?php echo $row_member['department']; ?></td>
					</tr>
					<?php	}	?>
				</table>
			</div>
      </div>
    </div>



  </body>
</html>
