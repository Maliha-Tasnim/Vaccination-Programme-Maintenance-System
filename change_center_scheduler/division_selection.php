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
            <h2 class="text-left">STEP :: 1</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		              <h4 class="display-3">
		              	<article>
		              	Please select a <strong>Division...</strong>
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
						global $division_id;
						$query_divsion = "SELECT * FROM division";
						$query_divsion_run = mysqli_query($con, $query_divsion);

						echo "<form method='post' action=''>";
						echo "<select name='division_id' class='form-control form-control-lg'>";
						while ($row = $query_divsion_run->fetch_assoc())
						{

						   echo '<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_division">NEXT</button>';
						echo '</form>';

						if(isset($_POST["submit_division"]))
						{
							$division_id = $_POST["division_id"];
							$_SESSION['division_id'] = $division_id;
							?>
						<script type="text/javascript">
		    				window.location = "../change_center_scheduler/district_selection.php";
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
