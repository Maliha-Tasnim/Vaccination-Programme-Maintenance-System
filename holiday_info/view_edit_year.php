<?php
  $page_title = 'Update Holiday Date';
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
require_once("../holiday_info/view_db_connect.php");
if(count($_POST)>0) {
	$sql = "UPDATE holiday_final set 
	holiday_name='" . $_POST["holiday_name"] . "', 
	holiday_date='" . $_POST["holiday_date"] . "', 
	holiday_month='" . $_POST["holiday_month"] . "', 
	holiday_year='" . $_POST["holiday_year"] . "' WHERE id='" . $_POST["id"] . "'";
	mysqli_query($mysqli,$sql);
	$message = "Record modified successfully.";
}
$select_query = "SELECT * FROM holiday_final WHERE id='" . $_GET["id"] . "'";
$result = mysqli_query($mysqli, $select_query);
$row = mysqli_fetch_array($result);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
			<h2>Holiday Modification</h2>
			<hr>
			<form name="frmData" method="post" action="">
			<div class="form-group">
				<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
				<div align="right" style="padding-bottom:5px;"><a href="../holiday_info/view_holiday.php">Back to Holiday</a></div>

				<div class="row">
					<div>
						<table class="table table-bordered">
						<tr>
							<th>Holiday Name</th>
							<th>Holiday Date</th>
							<th>Holiday Month</th>
							<th>Holiday Year</th>
						</tr>
						<tr>
							<td><input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>"><input type="text" name="holiday_name" class="form-control" required value="<?php echo $row['holiday_name']; ?>"></td>
							<td><input type="number" name="holiday_date" required class="form-control"  min="1" max="31" value="<?php echo $row['holiday_date']; ?>"></td>
							<td><input type="number" name="holiday_month" required class="form-control" min="1" max="12" value="<?php echo $row['holiday_month']; ?>"></td>
							<td><input type="number" name="holiday_year" required class="form-control" readonly value="<?php echo $row['holiday_year']; ?>"></td>
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
