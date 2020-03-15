<?php
  $page_title = 'Modify MR EPI Schedule';
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
require_once("../view_epi_schedule/mr_view_db_connect.php");
if(count($_POST)>0) {
	$sql = "UPDATE mr_schedule_final set 
	ward_id='" . $_POST["ward_id"] . "', 
	mr_jan='" . $_POST["mr_jan"] . "', 
	mr_feb='" . $_POST["mr_feb"] . "', 
	mr_mar='" . $_POST["mr_mar"] . "', 
	mr_apr='" . $_POST["mr_apr"] . "', 
	mr_may='" . $_POST["mr_may"] . "', 
	mr_jun='" . $_POST["mr_jun"] . "', 
	mr_jul='" . $_POST["mr_jul"] . "', 
	mr_aug='" . $_POST["mr_aug"] . "', 
	mr_sep='" . $_POST["mr_sep"] . "', 
	mr_oct='" . $_POST["mr_oct"] . "', 
	mr_nov='" . $_POST["mr_nov"] . "', 
	mr_dec='" . $_POST["mr_dec"] . "', 
	epi_year='" . $_POST["epi_year"] . "' WHERE id='" . $_POST["id"] . "'";
	mysqli_query($mysqli,$sql);
	$message = "Record modified successfully.";
}
$select_query = "SELECT * FROM mr_schedule_final WHERE id='" . $_GET["id"] . "'";
$result = mysqli_query($mysqli, $select_query);
$row = mysqli_fetch_array($result);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
			<h3>Monday-Thursday EPI Schedule Modification</h3>
			<hr>
			<form name="frmData" method="post" action="">
			<div class="form-group">
				<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<div align="right" style="padding-bottom:5px;"><a href="../view_epi_schedule/mr_view_schedule.php">Back to Schedule</a></div>

				<div class="row">
					<div>
						<table class="table table-bordered">
						<tr>
							<th>Ward No.</th>
							<th>Year</th>
						</tr>
						<tr>
							<td><input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>"><input type="number" name="ward_id" class="form-control" readonly value="<?php echo $row['ward_id']; ?>"></td>
							<td><input type="number" name="epi_year" required class="form-control" readonly value="<?php echo $row['epi_year']; ?>"></td>
						</tr>
						</table>
						<table class="table table-bordered">
						<tr>
		                    <th class='text-right'>Jan</th>
		                    <th class='text-right'>Feb</th>
		                    <th class='text-right'>Mar</th>
		                    <th class='text-right'>Apr</th>
		                    <th class='text-right'>May</th>
		                    <th class='text-right'>Jun</th>
		                    <th class='text-right'>Jul</th>
		                    <th class='text-right'>Aug</th>
		                    <th class='text-right'>Sep</th>
		                    <th class='text-right'>Oct</th>
		                    <th class='text-right'>Nov</th>
		                    <th class='text-right'>Dec</th>
		                </tr>
		                <tr>
		                	<td><input type="number" name="mr_jan" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_jan']; ?>"></td>
							<td><input type="number" name="mr_feb" required class="form-control"  min="1" max="29" value="<?php echo $row['mr_feb']; ?>"></td>
							<td><input type="number" name="mr_mar" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_mar']; ?>"></td>
							<td><input type="number" name="mr_apr" required class="form-control"  min="1" max="30" value="<?php echo $row['mr_apr']; ?>"></td>
							<td><input type="number" name="mr_may" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_may']; ?>"></td>
							<td><input type="number" name="mr_jun" required class="form-control"  min="1" max="30" value="<?php echo $row['mr_jun']; ?>"></td>
							<td><input type="number" name="mr_jul" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_jul']; ?>"></td>
							<td><input type="number" name="mr_aug" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_aug']; ?>"></td>
							<td><input type="number" name="mr_sep" required class="form-control"  min="1" max="30" value="<?php echo $row['mr_sep']; ?>"></td>
							<td><input type="number" name="mr_oct" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_oct']; ?>"></td>
							<td><input type="number" name="mr_nov" required class="form-control"  min="1" max="30" value="<?php echo $row['mr_nov']; ?>"></td>
							<td><input type="number" name="mr_dec" required class="form-control"  min="1" max="31" value="<?php echo $row['mr_dec']; ?>"></td>
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
