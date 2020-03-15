<?php
  $page_title = 'Statistics';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3>EPI Vaccine Statistics</h3>
      <hr>
      <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		            <?php
					$con = mysqli_connect("localhost","root","","central_db");

					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }
					?>
					<?php
						global $epi_year;

						$query_year = "SELECT DISTINCT epi_year FROM child_registration_details";
						$query_year_run = mysqli_query($con, $query_year);
						?>
						<form method="post" action="">
							<div class="col-lg-12">
								<label>Please select EPI Year for EPI Vaccine Details</label>
							    <select name='epi_year' class='form-control form-control-lg'>
								<?php
								while ($row = $query_year_run->fetch_assoc())
								{

								   echo '<option value="'.$row['epi_year'].'">'.$row['epi_year'].'</option>';
								}
								?>
								</select>
							</div>
						<div class="col-lg-4"><br><button class="btn btn-primary" type="submit" name="view">VIEW</button></div>
						</form>

						<?php
						if(isset($_POST["view"]))
						{
							$epi_year = $_POST["epi_year"];
							$_SESSION['epi_year'] = $epi_year;
							?>
						<script type="text/javascript">
		    				window.location = "../vaccine_statistics/division_level.php";
						</script>
					<?php 
						}
					?>
		            </div>
		          </div>
		        </div>
        		<br>
      		</div>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>