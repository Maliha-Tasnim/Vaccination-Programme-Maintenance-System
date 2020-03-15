<?php
  $page_title = 'Child Registration';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<?php
	$con = mysqli_connect("localhost","root","","central_db");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
<?php

	$union_id;
	$union_id = $_SESSION['union_id'];

	//upazila name start
	global $upazila_name;
	$query_upazila_name = "SELECT upazila.upazila_name FROM upazila JOIN union_council ON union_council.upazila_id = upazila.upazila_id WHERE union_council.union_id = $union_id";
	$query_upazila_name_run = mysqli_query($con, $query_upazila_name);

	while ($row = $query_upazila_name_run->fetch_assoc())
	{
		$upazila_name = $row['upazila_name'];
	}
	//upazila name ends

	//district name start
	global $district_name;
	$query_district_name = "SELECT district.district_name FROM district JOIN upazila ON district.district_id = upazila.district_id JOIN union_council ON union_council.upazila_id = upazila.upazila_id WHERE union_council.union_id = $union_id";
	$query_district_name_run = mysqli_query($con, $query_district_name);

	while ($row = $query_district_name_run->fetch_assoc())
	{
		$district_name = $row['district_name'];
	}
	//district name ends

	//union name start
	global $union_name;
	$query_union_name = "SELECT union_name FROM union_council WHERE union_id = $union_id";
	$query_union_name_run = mysqli_query($con, $query_union_name);

	while ($row = $query_union_name_run->fetch_assoc())
	{
		$union_name = $row['union_name'];
	}
	//union name ends

	//center & sub-block name start
	global $center_name;
	global $sub_block_name;
	$center_id;
	$center_id = $_SESSION['center_id'];
	$query_center_name = "SELECT * FROM epi_schedule WHERE union_id = $union_id AND center_id = $center_id";
	$query_center_name_run = mysqli_query($con, $query_center_name);

	while ($row = $query_center_name_run->fetch_assoc())
	{
		$center_name = $row['center_name'];
	}

	$query_sub_block_name = "SELECT * FROM epi_schedule WHERE union_id = $union_id AND center_id = $center_id";
	$query_sub_block_name_run = mysqli_query($con, $query_sub_block_name);

	while ($row = $query_sub_block_name_run->fetch_assoc())
	{
		$sub_block_name = $row['sub_block_name'];
	}
	//center & sub-block name ends

	//ward no starts
	$ward_no;
	$ward_no = $_SESSION['ward_no'];
	//ward no ends

	//username starts
	$username;
	$username = $_SESSION['username'];
	//username ends

	//epi_year starts
	$epi_year;
	$epi_year = $_SESSION['epi_year'];
	//epi_year ends

?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-left">Step 3 | Child Registration</h3>
      <hr>
      <form method="post" action="">
      	<div class="col-lg-12">
      	<div class="alert alert-success" role="alert">
		  <strong>CHILD INFORMATION</strong><br><small>[Some information cannot be modified later once you save it.]</small>
		</div>
		</div>
      	<div class="col-lg-6">
		    <label>Registration No</label>
		    <input type="number" required class="form-control" name="reg_no" placeholder="Enter registration No">
		</div>
		<div class="col-lg-6">
		    <label>Registration Date [Month-Day-Year]</label>
		    <input type="date" required class="form-control" name="reg_date">
		</div>
		<div class="col-lg-8">
		<br>
		    <label>Name</label>
		    <input type="text" required class="form-control" name="name" placeholder="Enter Child Name">
		</div>
		<div class="col-lg-4">
		<br>
		    <label>Gender: </label>
		    <select class="form-control" name="gender">
			  <option value="M">Male</option>
			  <option value="F">Female</option>
			  <option value="O">Other</option>
			</select>
		</div>
		<div class="col-lg-12">
		<br>
		    <label>Date of Birth [Month-Day-Year]</label>
		    <input type="date" required class="form-control" name="date_of_birth">
		</div>
		<div class="col-lg-12">
		<br>
		    <label>Birth Certificate No</label>
		    <input type="number" min="1" class="form-control" name="birth_certificate_no" placeholder="Enter Birth Certificate No (if available)">
		</div>
		<div class="col-lg-12">
		<br>
		    <label>Mother Name</label>
		    <input type="text" required class="form-control" name="mother_name" placeholder="Enter Child Mother Name">
		</div>
		<div class="col-lg-12">
		<br>
		    <label>Father Name</label>
		    <input type="text" required class="form-control" name="father_name" placeholder="Enter Child Father Name">
		</div>
		<div class="col-lg-6">
		<br>
		    <label>House/Road #</label>
		    <input type="text" required class="form-control" name="house_road_no" placeholder="Enter House/Road #">
		</div>
		<div class="col-lg-6">
		<br>
		    <label>Village</label>
		    <input type="text" required class="form-control" name="village" placeholder="Enter Village Name">
		</div>
		<div class="col-lg-12">
		<br>
		    <label>Upazila</label>
		    <input type="text" readonly class="form-control" name="upazila_name" placeholder="Something went wrong. Try again!" value="<?php echo (isset($upazila_name)) ? $upazila_name: ''?>">
		</div>
		<div class="col-lg-4">
		<br>
		    <label>District</label>
		    <input type="text" readonly class="form-control" name="district_name" placeholder="Something went wrong. Try again!" value="<?php echo (isset($district_name)) ? $district_name: ''?>">
		</div>
		<div class="col-lg-4">
		<br>
		    <label>Union</label>
		    <input type="text" readonly class="form-control" name="union_name" placeholder="Something went wrong. Try again!" value="<?php echo (isset($union_name)) ? $union_name: ''?>">
		</div>
		<div class="col-lg-4">
		<br>
		    <label>Ward No.</label>
		    <input type="text" readonly class="form-control" name="ward_no" placeholder="Something went wrong. Try again!" value="<?php echo (isset($ward_no)) ? $ward_no: ''?>">
		</div>
		<div class="col-lg-8">
		<br>
		    <label>Center Name</label>
		    <input type="text" readonly class="form-control" name="center_name" placeholder="Something went wrong. Try again!" value="<?php echo (isset($center_name)) ? $center_name: ''?>">
		</div>
		<div class="col-lg-4">
		<br>
		    <label>Sub-Block</label>
		    <input type="text" readonly class="form-control" name="sub_block_name" placeholder="Something went wrong. Try again!" value="<?php echo (isset($sub_block_name)) ? $sub_block_name: ''?>">
		</div>
		<div class="col-lg-12">
		<br>
      	<div class="alert alert-success" role="alert">
		  <strong>HEALTH ASSISTANT</strong>
		</div>
		</div>
		<div class="col-lg-6">
		    <label>Name</label>
		    <input type="text" required class="form-control" name="ha_name" placeholder="Enter Health Assitant Name">
		</div>
		<div class="col-lg-6">
		    <label>Contact No.</label>
		    <input type="number" required class="form-control" name="ha_contact" placeholder="Enter Contact No.">
		</div>
		<div class="col-lg-12">
		<br>
			<button class="btn btn-primary" type="submit" name="submit_details">SAVE</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btn btn-warning" href="../epi_details_reg/center_selection.php">PREVIOUS</a>
			<?php
			if(isset($_POST["submit_details"]))
			{
				$reg_no 					= $_POST['reg_no'];
				$reg_date 					= $_POST['reg_date'];
				$name 						= $_POST['name'];
				$gender 					= $_POST['gender'];
				$date_of_birth 				= $_POST['date_of_birth'];
				$birth_certificate_no 		= $_POST['birth_certificate_no'];
				$mother_name 				= $_POST['mother_name'];
				$father_name 				= $_POST['father_name'];
				$house_road_no 				= $_POST['house_road_no'];
				$village 					= $_POST['village'];

				$ha_name 		= $_POST['ha_name'];
				$ha_contact 	= $_POST['ha_contact'];

				$sql_insert = "INSERT INTO child_registration_details (username, union_id, ward_no, epi_year, center_id, center_name, reg_no, reg_date, name, gender, date_of_birth, birth_certificate_no, mother_name, father_name, house_road_no, village, upazila_name, district_name, union_name, sub_block_name, ha_name, ha_contact) VALUES ('$username', '$union_id', '$ward_no', '$epi_year', '$center_id', '$center_name', '$reg_no', '$reg_date', '$name', '$gender', '$date_of_birth', '$birth_certificate_no', '$mother_name', '$father_name', '$house_road_no', '$village', '$upazila_name', '$district_name', '$union_name', '$sub_block_name', '$ha_name', '$ha_contact')";
				$sql_insert_run = mysqli_query($con, $sql_insert);

				$_SESSION['epic_id'] = mysqli_insert_id($con);
			?>
				<script type="text/javascript">
		    		window.location = "../epi_details_reg/epi_thanks.php";
				</script>
			<?php 
				}
			?>
		<br><br>
		</div>
      </form>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
