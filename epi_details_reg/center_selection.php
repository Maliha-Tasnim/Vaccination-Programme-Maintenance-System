<?php
  $page_title = 'Selection';
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
            <h3 class="text-left">Step 2 | Select EPI Center</h3>
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
						global $center_id;
						$username;
						$username = $_SESSION['username'];
						$union_id;
						$union_id = $_SESSION['union_id'];
						$ward_no;
						$ward_no = $_SESSION['ward_no'];
						$epi_year;
						$epi_year = $_SESSION['epi_year'];
						
						$query_center = "SELECT * FROM epi_schedule WHERE union_id = $union_id AND ward_no = $ward_no AND epi_year_ec = $epi_year AND epi_year_es = $epi_year";
						$query_center_run = mysqli_query($con, $query_center);

						echo "<form method='post' action=''>";
						echo "<label>Select Center</label>";
						echo "<select name='center_id' class='form-control form-control-lg'>";
						while ($row = $query_center_run->fetch_assoc())
						{

						   echo '<option value="'.$row['center_id'].'">'.$row['center_name'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_center">NEXT</button>';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo '<a class="btn btn-warning" href="../epi_details_reg/index.php">PREVIOUS</a>';
						echo "<br><br><small><strong>Notice: </strong>If there is no value on dropdown field then it is possible because, no EPI Schedule has been created for that EPI Center. Please contact with upazila health officer to resolve the issue.</small>";
						echo '</form>';

						if(isset($_POST["submit_center"]))
						{
							$center_id = $_POST["center_id"];
							$_SESSION['center_id'] = $center_id;
							?>
						<script type="text/javascript">
		    				window.location = "../epi_details_reg/child_reg.php";
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