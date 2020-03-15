<?php
  $page_title = 'Modify EPI Center Info';
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
require_once("../modify_center_scheduler/db_connect.php");
if(count($_POST)>0) {
	$sql = "UPDATE epi_schedule set 
	ward_no='" . $_POST["ward_no"] . "', 
	sub_block_name='" . $_POST["sub_block_name"] . "', 
	center_name='" . $_POST["center_name"] . "', 
	from_house='" . $_POST["from_house"] . "', 
	to_house='" . $_POST["to_house"] . "', 
	jan_date='" . $_POST["jan_date"] . "', 
	feb_date='" . $_POST["feb_date"] . "', 
	mar_date='" . $_POST["mar_date"] . "', 
	apr_date='" . $_POST["apr_date"] . "', 
	may_date='" . $_POST["may_date"] . "', 
	jun_date='" . $_POST["jun_date"] . "', 
	jul_date='" . $_POST["jul_date"] . "', 
	aug_date='" . $_POST["aug_date"] . "', 
	sep_date='" . $_POST["sep_date"] . "', 
	oct_date='" . $_POST["oct_date"] . "', 
	nov_date='" . $_POST["nov_date"] . "', 
	dec_date='" . $_POST["dec_date"] . "', 
	ha_details='" . $_POST["ha_details"] . "' WHERE id='" . $_POST["id"] . "'";
	mysqli_query($mysqli,$sql);
	$message = "Record is modified successfully";
}
$select_query = "SELECT * FROM epi_schedule WHERE id='" . $_GET["id"] . "'";
$result = mysqli_query($mysqli, $select_query);
$row = mysqli_fetch_array($result);
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 aligh="left">Modify Individual EPI Center Information</h1>
      <hr>
      <form name="frmData" method="post" action="">
      	<div class="form-group">
      		<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
			<div align="right" style="padding-bottom:5px;"><a href="../modify_center_scheduler/index.php">Back to EPI Schudler</a></div>
      	</div>
      	<div class="row">
			<div>
				<table class="table table-bordered" width="100%">
					<tr>
						<th>Ward No</th>
						<th>Sub-Block</th>
						<th>Center Name</th>
						<th>From House</th>
						<th>To House</th>
						<th>Center Type</th>
					</tr>
					<tr>
						<td><input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>"><input type="number" name="ward_no" class="form-control" min="1" max="3" required value="<?php echo $row['ward_no']; ?>"></td>
						<td><input type="text" name="sub_block_name" required class="form-control" value="<?php echo $row['sub_block_name']; ?>"></td>
						<td><input type="text" name="center_name" required class="form-control" value="<?php echo $row['center_name']; ?>"></td>
						<td><input type="text" name="from_house" required class="form-control" value="<?php echo $row['from_house']; ?>"></td>
						<td><input type="text" name="to_house" required class="form-control" value="<?php echo $row['to_house']; ?>"></td>
						<td><input type="text" name="center_type" required class="form-control" value="<?php echo $row['center_type']; ?>"></td>
					</tr>
				</table>
				<table class="table table-bordered" width="100%">
					<tr>
						<th>JAN</th>
						<th>FEB</th>
						<th>MAR</th>
						<th>APR</th>
						<th>MAY</th>
						<th>JUN</th>
						<th>JUL</th>
						<th>AUG</th>
						<th>SEP</th>
						<th>OCT</th>
						<th>NOV</th>
						<th>DEC</th>
					</tr>
					<tr>
						<td><input type="number" name="jan_date" required class="form-control" min="1" max="31" value="<?php echo $row['jan_date']; ?>"></td>
						<td><input type="number" name="feb_date" required class="form-control" min="1" max="29" value="<?php echo $row['feb_date']; ?>"></td>
						<td><input type="number" name="mar_date" required class="form-control" min="1" max="31" value="<?php echo $row['mar_date']; ?>"></td>
						<td><input type="number" name="apr_date" required class="form-control" min="1" max="30" value="<?php echo $row['apr_date']; ?>"></td>
						<td><input type="number" name="may_date" required class="form-control" min="1" max="31" value="<?php echo $row['may_date']; ?>"></td>
						<td><input type="number" name="jun_date" required class="form-control" min="1" max="30" value="<?php echo $row['jun_date']; ?>"></td>
						<td><input type="number" name="jul_date" required class="form-control" min="1" max="31" value="<?php echo $row['jul_date']; ?>"></td>
						<td><input type="number" name="aug_date" required class="form-control" min="1" max="31" value="<?php echo $row['aug_date']; ?>"></td>
						<td><input type="number" name="sep_date" required class="form-control" min="1" max="30" value="<?php echo $row['sep_date']; ?>"></td>
						<td><input type="number" name="oct_date" required class="form-control" min="1" max="31" value="<?php echo $row['oct_date']; ?>"></td>
						<td><input type="number" name="nov_date" required class="form-control" min="1" max="30" value="<?php echo $row['nov_date']; ?>"></td>
						<td><input type="number" name="dec_date" required class="form-control" min="1" max="31" value="<?php echo $row['dec_date']; ?>"></td>
					</tr>
				</table>
				<table class="table table-bordered" width="100%">
					<tr>
						<th>HA Details</th>
					</tr>
					<tr>
						<td><input type="text" name="ha_details" required class="form-control" value="<?php echo $row['ha_details']; ?>"></td>
					</tr>
				</table>	
			</div>
		</div>
		<div class="row">
			<div><input type="submit" name="submit" value="Submit" class="btn btn-success">
			</div>
		</div>
      </form>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
