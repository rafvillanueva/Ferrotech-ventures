<?php
include('../dbcon.php');
if(isset($_POST['regCode'])){
	$regCode = $_POST['regCode'];
	$region = mysqli_query($conn, "SELECT * FROM refprovince WHERE regCode = '$regCode'");
	echo "<option>--</option>";
	while ($row = mysqli_fetch_array($region)) {
		echo '<option value="'.$row['provCode'].'">' . $row['provDesc'] . '</option>';
	}
}elseif(isset($_POST['citymunCode'])){
	$citymunCode = $_POST['citymunCode'];
	$city = mysqli_query($conn, "SELECT * FROM refcitymun WHERE provCode = '$citymunCode'");
	echo "<option>--</option>";
	while ($row = mysqli_fetch_array($city)) {
		echo '<option value="'.$row['citymunCode'].'">' . $row['citymunDesc'] . '</option>';
	}
}elseif(isset($_POST['citymunCodez'])){
	$brgyCode = $_POST['citymunCodez'];
	$brgy = mysqli_query($conn, "SELECT * FROM refbrgy WHERE citymunCode = '$brgyCode'");
	echo "<option>--</option>";
	while ($row = mysqli_fetch_array($brgy)) {
		echo "<option>" . $row['brgyDesc'] . "</option>";
	}
}
?>