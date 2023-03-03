<html>



  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
		<title>HRIS FERROTECH</title>
		
		<style>
		
		
.container {
	width:90%;
	margin-top: -30px;
}
		
.table {
    width: 100%;
    margin-top: -10px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}

@media print{
#print {
display:none;
}
}


		
		</style>
<script>
function printPage() {
    window.print();
}
</script>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		
<button style="font-family: oblique;" class="btn btn-primary" type="submit" id="print" onclick="printPage()">Go!</button>

			<center><img src="../images/print_logo.jpg" height="170px;" width="750px" style="margin-top: -50px;"></center>
			<p style = "margin-left:30px; margin-top: -70px; font-size:30pt; font-weight:bold;  text-align:center;"><center><h4 style="font-weight: bold;font-family:oblique; margin-left: 20px;">PROJECTBASED EMPLOYEE LIST</h4></center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('current-date.php'); ?>
        </div>			
		<br/> <br>
<?php
					include ('database_print.php');
					$result = $database->prepare ("SELECT * FROM table_list where record_status = 'projectbased' order by id DESC");
?>
						<table class="table table-bordered table-striped">
						  <thead>
								<tr>
									<th><center>Id number</center></th>
									<th><center>First name</center></th>
									<th><center>Middle name</center></th>
									<th><center>Last name</center></th>
									<th><center>Position</center></th>
									<th><center>Department</center></th>
								</tr>
						  </thead>   
						  <tbody>
<?php
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
					
							<?php 
							}					
							?>
						  </tbody> 
					  </table> 

<br />
<br />
<footer>
<b style="color:blue; font-size:15px;">
Prepared By: HRIS Mngmt.
</b>
</footer>

			</div>
	
	
	
	

	</div>
</body>


</html>