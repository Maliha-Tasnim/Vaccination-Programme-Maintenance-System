<?php
  $page_title = 'Change Schedule';
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
            <h2 class="text-left">STEP :: 2</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		              <h4 class="display-3">
		              	<article>
		              	Please select a <strong>District...</strong>
		              </article>
		              </h4>
		              <br>
		            <?php
					$con = mysqli_connect("localhost","root","","central_db");

					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }
					?>
					<?php
						global $district_id;
						$division_id;
						$division_id = $_SESSION['division_id'];
						
						$query_district = "SELECT * FROM district WHERE division_id = $division_id";
						$query_district_run = mysqli_query($con, $query_district);

						echo "<form method='post' action=''>";
						echo "<select name='district_id' class='form-control form-control-lg'>";
						while ($row = $query_district_run->fetch_assoc())
						{

						   echo '<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_district">NEXT</button>';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo '<a class="btn btn-warning" href="../change_center_scheduler/division_selection.php">PREVIOUS</a>';
						echo '</form>';

						if(isset($_POST["submit_district"]))
						{
							$district_id = $_POST["district_id"];
							$_SESSION['district_id'] = $district_id;
							?>
						<script type="text/javascript">
		    				window.location = "../change_center_scheduler/upazila_selection.php";
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