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
            <h2 class="text-left">STEP :: 3</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		              <h4 class="display-3">
		              	<article>
		              	Please select an <strong>Upazila...</strong>
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
						global $upazila_id;
						$district_id;
						$district_id = $_SESSION['district_id'];
						
						$query_upazila = "SELECT * FROM upazila WHERE district_id = $district_id";
						$query_upazila_run = mysqli_query($con, $query_upazila);

						echo "<form method='post' action=''>";
						echo "<select name='upazila_id' class='form-control form-control-lg'>";
						while ($row = $query_upazila_run->fetch_assoc())
						{

						   echo '<option value="'.$row['upazila_id'].'">'.$row['upazila_name'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_upazila">NEXT</button>';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo '<a class="btn btn-warning" href="../change_center_scheduler/district_selection.php">PREVIOUS</a>';
						echo '</form>';

						if(isset($_POST["submit_upazila"]))
						{
							$upazila_id = $_POST["upazila_id"];
							$_SESSION['upazila_id'] = $upazila_id;
							?>
						<script type="text/javascript">
		    				window.location = "../change_center_scheduler/union_selection.php";
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